<?php

namespace Pods;

use Pods;
use Pods\Whatsit\Pod;
use WP_Error;

/**
 * Manage Pods instances for reuse.
 *
 * @since 2.9.0
 */
class Pod_Manager {

	/**
	 * The list of Pods instances.
	 *
	 * @since 2.9.0
	 *
	 * @var array<string,Pods>
	 */
	private $instances = [];

	/**
	 * Get the Pods object for a specific pod name and item ID. Possibly use already built-object if available.
	 *
	 * @since 2.9.0
	 *
	 * @param array|string $args The list of arguments to use or the Pod name to use.
	 *
	 * @return bool|Pods|WP_Error The Pods object, the WP_Error message, or false if the Pods object is not found.
	 */
	public function get_pod( $args = [] ) {
		if ( is_string( $args ) ) {
			$func_args = func_get_args();

			$args = [
				'name' => $args,
			];

			if ( isset( $func_args[1] ) ) {
				if ( is_array( $func_args[1] ) ) {
					$args['find'] = $func_args[1];
				} else {
					$args['id'] = $func_args[1];
				}
			}
		}

		if ( ! isset( $args['name'] ) ) {
			return new WP_Error( __( 'Pod name is required.', 'pods' ) );
		}

		$key         = $args['name'];
		$id          = isset( $args['id'] ) ? $args['id'] : null;
		$find        = isset( $args['find'] ) ? $args['find'] : null;
		$store_by_id = isset( $args['store_by_id'] ) && ! $args['store_by_id'];
		$validation  = isset( $args['validation'] ) && $args['validation'];
		$strict      = isset( $args['strict'] ) ? $args['strict'] : null;

		if ( $id && $store_by_id ) {
			$key .= '/' . $id;
		}

		if ( isset( $this->instances[ $key ] ) ) {
			if ( $id && ! $store_by_id && (int) $this->instances[ $key ]->id() !== (int) $id ) {
				$this->instances[ $key ]->fetch( $id );
			} elseif ( $find ) {
				$this->instances[ $key ]->find( $find );
			}

			return $this->instances[ $key ];
		}

		$pod = pods( $args['name'], $id, $strict );

		if ( $validation ) {
			if ( ! $pod || ! $pod->valid() ) {
				return new WP_Error( __( 'Pod not found.', 'pods' ) );
			}

			if ( $id && ! $pod->exists() ) {
				return new WP_Error( __( 'Pod item not found.', 'pods' ) );
			}
		}

		if ( $pod && $find ) {
			$pod->find( $find );
		}

		if ( $pod ) {
			$this->instances[ $key ] = $pod;
		}

		return $pod;
	}

	/**
	 * Flush the instances stored.
	 *
	 * @param null|string|Pod $pod The pod name or the Pod object to flush instances for, otherwise leave as null to flush all instances.
	 */
	public function flush( $pod = null ) {
		if ( ! $pod ) {
			$this->instances = [];

			return;
		}

		$pod_name = $pod instanceof Pod ? $pod->get_name() : $pod;

		foreach ( $this->instances as $key => $instance ) {
			if ( $key === $pod_name ) {
				unset( $this->instances[ $key ] );
			} elseif ( $instance->pod_data && $instance->pod_data->get_name() === $pod_name ) {
				unset( $this->instances[ $key ] );
			}
		}
	}

}

<?php
/**
 * Predictive Search Bulk Quick Editions
 *
 * Class Function into WP e-Commerce plugin
 *
 * Table Of Contents
 *
 *
 * create_custombox()
 * a3_people_metabox()
 */

add_filter( 'manage_product_posts_columns', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'column_heading' ), 11 );
add_filter( 'manage_post_posts_columns', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'column_heading' ), 11 );
add_filter( 'manage_page_posts_columns', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'column_heading' ) , 11);

add_action( 'manage_product_posts_custom_column', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'column_content' ), 10, 2 );
add_action( 'manage_post_posts_custom_column', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'column_content' ), 10, 2 );
add_action( 'manage_page_posts_custom_column', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'column_content' ), 10, 2 );

add_action( 'bulk_edit_custom_box',  array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'admin_bulk_edit' ), 10, 2);
add_action( 'save_post', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'admin_bulk_edit_save' ), 10, 2 );

add_action( 'quick_edit_custom_box',  array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'quick_edit' ), 10, 2 );
add_action( 'admin_enqueue_scripts', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'quick_edit_scripts' ), 10 );
add_action( 'save_post', array( 'WC_Predictive_Search_Bulk_Quick_Editions', 'quick_edit_save' ), 10, 2 );

class WC_Predictive_Search_Bulk_Quick_Editions
{
	/**
	 * Column for Products , Post, Page
	 *
	 * @access public
	 * @param mixed $columns
	 * @return array
	 */
	public static function column_heading( $existing_columns ) {
	
		if ( empty( $existing_columns ) && ! is_array( $existing_columns ) )
			$existing_columns = array();
	
		$our_columns = array();
		$our_columns["predictive_search_focuskw"] = __( 'PS Focus KW', 'woops' );
	
		return array_merge( $existing_columns, $our_columns );
	}
	
	
	
	
	/**
	 * Custom Columns for Products , Post, Page
	 *
	 * @access public
	 * @param mixed $column
	 * @return void
	 */
	public static function column_content( $column_name, $post_id  ) {
		if ( $column_name == 'predictive_search_focuskw' ) {
			$_predictive_search_focuskw = get_post_meta( $post_id, '_predictive_search_focuskw', true );
			esc_attr_e( $_predictive_search_focuskw );
			
			$exclude_items = array();
			if (get_post_type($post_id) == 'product') {
				$exclude_items = (array) get_option('woocommerce_search_exclude_products');
			} elseif (get_post_type($post_id) == 'page') {
				$exclude_items = (array) get_option('woocommerce_search_exclude_pages');
			} elseif (get_post_type($post_id) == 'post') {
				$exclude_items = (array) get_option('woocommerce_search_exclude_posts');
			}
			$woocommerce_search_exclude_item = 'no';
			if (is_array($exclude_items) && in_array($post_id, $exclude_items)) {
				$woocommerce_search_exclude_item = 'yes';
			}
			echo '<div class="hidden" style="display:none" id="wc_predictive_search_inline_'.$post_id.'"><div class="predictive_search_focuskw">'.esc_attr( $_predictive_search_focuskw ).'</div><div class="woocommerce_search_exclude_item">'.$woocommerce_search_exclude_item.'</div></div>';
		}
	}	

	/**
	 * Custom bulk edit - form
	 *
	 * @access public
	 * @param mixed $column_name
	 * @param mixed $post_type
	 * @return void
	 */
	public static function admin_bulk_edit( $column_name, $post_type ) {
		if ( $column_name != 'predictive_search_focuskw' || !in_array( $post_type, array( 'product', 'post', 'page' ) ) ) return;
		?>
		<fieldset class="inline-edit-col-right inline-edit-predictive-search">
			<div id="wc-predictive-search-fields-bulk" class="inline-edit-col">
				<h4><?php _e( 'Predictive Search', 'woops' ); ?></h4>
                <div class="">
                    <label class="inline-edit-tags">
                        <span class="title" style="width:100px;"><?php _e( 'Focus Keywords', 'woops' ); ?></span> &nbsp;&nbsp;&nbsp;
                        <span class="">
                            <select class="change_ps_keyword change_to" name="change_ps_keyword">
                            <?php
                                $options = array(
                                    '' 	=> __( '- No Change -', 'woops' ),
                                    '1' => __( 'Change to:', 'woops' ),
                                );
                                foreach ($options as $key => $value) {
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                }
                            ?>
                            </select>
                        </span>
                    </label>
                    <label class="wc-predictive-keyword-value">
                        <textarea class="predictive_search_focuskw" name="_predictive_search_focuskw" rows="1" cols="22" autocomplete="off" placeholder="<?php _e( 'Enter Focus keywords', 'woops' ); ?>"></textarea>
                    </label>
                </div>
                <div class="">
                    <label class="inline-edit-tags">
                        <span class="title" style="width:100px;"><?php _e( 'Show / Hide', 'woops' ); ?></span> &nbsp;&nbsp;&nbsp;
                        <span class="">
                            <select class="woocommerce_search_exclude_item" name="_woocommerce_search_exclude_item">
                            <?php
                                $options = array(
                                    '' 	=> __( '- No Change -', 'woops' ),
                                    '1' => __( 'Hide from Predictive Search results', 'woops' ),
									'2' => __( 'Show in Predictive Search results', 'woops' ),
                                );
                                foreach ($options as $key => $value) {
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                }
                            ?>
                            </select>
                        </span>
                    </label>
                </div>
				
				<input type="hidden" name="predictive_search_bulk_edit_nonce" value="<?php echo wp_create_nonce( 'predictive_search_bulk_edit_nonce' ); ?>" />
			</div>
		</fieldset>
		<?php
	}
	
	
	/**
	 * Custom bulk edit - save
	 *
	 * @access public
	 * @param mixed $post_id
	 * @param mixed $post
	 * @return void
	 */
	public static function admin_bulk_edit_save( $post_id, $post ) {
	
		if ( is_int( wp_is_post_revision( $post_id ) ) ) return;
		if ( is_int( wp_is_post_autosave( $post_id ) ) ) return;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
		if ( ! isset( $_REQUEST['predictive_search_bulk_edit_nonce'] ) || ! wp_verify_nonce( $_REQUEST['predictive_search_bulk_edit_nonce'], 'predictive_search_bulk_edit_nonce' ) ) return $post_id;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return $post_id;
		if ( !in_array( $post->post_type, array( 'product', 'post', 'page' ) ) ) return $post_id;
		
		// Save fields
		if ( ! empty( $_REQUEST['change_ps_keyword'] ) && isset( $_REQUEST['_predictive_search_focuskw'] ) )
			update_post_meta( $post_id, '_predictive_search_focuskw', trim( $_REQUEST['_predictive_search_focuskw'] ) );
			
		if ( ! empty( $_REQUEST['_woocommerce_search_exclude_item'] ) ) {

			$exclude_option = 'woocommerce_search_exclude_products';
			if ($post->post_type == 'product') {
				$exclude_option = 'woocommerce_search_exclude_products';
			} elseif ($post->post_type == 'page') {
				$exclude_option = 'woocommerce_search_exclude_pages';
			} elseif ($post->post_type == 'post') {
				$exclude_option = 'woocommerce_search_exclude_posts';
			}
				
			$exclude_items = (array) get_option($exclude_option);
			if (!is_array($exclude_items)) $exclude_items = array();
				
			if ( $_REQUEST['_woocommerce_search_exclude_item'] == 1) {
				if (!in_array($post_id, $exclude_items)) $exclude_items[] = $post_id;
			} else {
				$exclude_items = array_diff($exclude_items, array($post_id));
			}
			update_option($exclude_option, $exclude_items);
		}
	
	}
	
	/**
	 * Custom quick edit - form
	 *
	 * @access public
	 * @param mixed $column_name
	 * @param mixed $post_type
	 * @return void
	 */
	public static function quick_edit( $column_name, $post_type ) {
		if ( $column_name != 'predictive_search_focuskw' || !in_array( $post_type, array( 'product', 'post', 'page' ) ) ) return;
		?>
		<fieldset class="inline-edit-col-right">
			<div id="wc-predictive-search-fields-quick" class="inline-edit-col">
				<h4><?php _e( 'Predictive Search', 'woops' ); ?></h4>
				<div>
					<label class="">
						<span class="title"><?php _e( 'Focus Keywords', 'woops' ); ?></span>
                        <textarea class="_predictive_search_focuskw" name="_predictive_search_focuskw" rows="1" cols="22" autocomplete="off" placeholder="<?php _e( 'Enter Focus keywords', 'woops' ); ?>"></textarea>
					</label>
				</div>
                <div class="inline-edit-group">
					<label class="alignleft">
                        <input type="checkbox" value="1" name="_woocommerce_search_exclude_item" />
                        <span class="checkbox-title"><?php _e('Hide from Predictive Search results.', 'woops'); ?></span>
                    </label>
				</div>
				<input type="hidden" name="predictive_search_quick_edit_nonce" value="<?php echo wp_create_nonce( 'predictive_search_quick_edit_nonce' ); ?>" />
			</div>
		</fieldset>
		<?php
	}
	
	
	/**
	 * Custom quick edit - script
	 *
	 * @access public
	 * @param mixed $hook
	 * @return void
	 */
	public static function quick_edit_scripts( $hook ) {
		global $post_type;
	
		if ( $hook == 'edit.php' && in_array( $post_type, array( 'product', 'post', 'page' ) ) )
			wp_enqueue_script( 'predictive_search_quick-edit', WOOPS_JS_URL . '/quick-edit.js', array('jquery') );
	}
	
	
	/**
	 * Custom quick edit - save
	 *
	 * @access public
	 * @param mixed $post_id
	 * @param mixed $post
	 * @return void
	 */
	public static function quick_edit_save( $post_id, $post ) {
	
		if ( ! $_POST || is_int( wp_is_post_revision( $post_id ) ) || is_int( wp_is_post_autosave( $post_id ) ) ) return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return $post_id;
		if ( ! isset( $_POST['predictive_search_quick_edit_nonce'] ) || ! wp_verify_nonce( $_POST['predictive_search_quick_edit_nonce'], 'predictive_search_quick_edit_nonce' ) ) return $post_id;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return $post_id;
		if ( !in_array( $post->post_type, array( 'product', 'post', 'page' ) ) ) return $post_id;
	
		global $wpdb;
	
		if ( version_compare( WC()->version, '2.2.0', '<' ) ) {
			$product = get_product( $post );
		} else {
			$product = wc_get_product( $post );
		}
		$old_regular_price = $product->regular_price;
		$old_sale_price    = $product->sale_price;
	
		// Save fields
		if ( isset( $_POST['_predictive_search_focuskw'] ) && trim( $_POST['_predictive_search_focuskw'] ) != '' )
			update_post_meta( $post_id, '_predictive_search_focuskw', trim( $_POST['_predictive_search_focuskw'] ) );
		
		$exclude_option = 'woocommerce_search_exclude_products';
		if ($post->post_type == 'product') {
			$exclude_option = 'woocommerce_search_exclude_products';
		} elseif ($post->post_type == 'page') {
			$exclude_option = 'woocommerce_search_exclude_pages';
		} elseif ($post->post_type == 'post') {
			$exclude_option = 'woocommerce_search_exclude_posts';
		}
			
		$exclude_items = (array) get_option($exclude_option);
		if (!is_array($exclude_items)) $exclude_items = array();
			
		if (isset($_POST['_woocommerce_search_exclude_item']) && $_POST['_woocommerce_search_exclude_item'] == 1) {
			if (!in_array($post_id, $exclude_items)) $exclude_items[] = $post_id;
		} else {
			$exclude_items = array_diff($exclude_items, array($post_id));
		}
		update_option($exclude_option, $exclude_items);
	}

}
?>
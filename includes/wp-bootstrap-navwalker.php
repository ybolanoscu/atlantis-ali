<?php
/**
 * WP Bootstrap Navwalker
 *
 * @package WP-Bootstrap-Navwalker
 */
/**
 * Class Name: WP_Bootstrap_Navwalker
 * Plugin Name: WP Bootstrap Navwalker
 * Plugin URI:  https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Author: Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz
 * Version: 3.0.2
 * Author URI: https://github.com/wp-bootstrap
 * GitHub Plugin URI: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * GitHub Branch: master
 * License: GPL-3.0+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 */
/* Check if Class Exists. */
if ( ! class_exists( 'WP_Bootstrap_Navwalker' ) ) {
	/**
	 * WP_Bootstrap_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
//	class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
//		/**
//		 * Start Level.
//		 *
//		 * @see Walker::start_lvl()
//		 * @since 3.0.0
//		 *
//		 * @access public
//		 *
//		 * @param mixed $output Passed by reference. Used to append additional content.
//		 * @param int $depth (default: 0) Depth of page. Used for padding.
//		 * @param array $args (default: array()) Arguments.
//		 *
//		 * @return void
//		 */
////		public function start_lvl( &$output, $depth = 0, $args = array() ) {
////			$indent = str_repeat( "\t", $depth );
////			$class_names = array("dropdown-menu");
////			if ( $depth == 0) {
////				$class_names[] = 'dropdown-big';
////			}
////
//////			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $class_names, $args, $depth ) );
//////			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
////
////			$output .= "\n$indent<ul role=\"menu\" class=\" " . join(' ', $class_names) . "\" >\n";
////
////		}
//		public function start_lvl( &$output, $depth = 0, $args = array() ) {
//			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
//				$t = '';
//				$n = '';
//			} else {
//				$t = "\t";
//				$n = "\n";
//			}
//			$indent = str_repeat( $t, $depth );
//
//			// Default class.
//			$classes = array( 'sub-menu' );
//
//			/**
//			 * Filters the CSS class(es) applied to a menu list element.
//			 *
//			 * @since 4.8.0
//			 *
//			 * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
//			 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
//			 * @param int      $depth   Depth of menu item. Used for padding.
//			 */
//			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
//			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
//
//			$output .= "{$n}{$indent}<ul$class_names>{$n}";
//		}
//
//		/**
//		 * Start El.
//		 *
//		 * @see Walker::start_el()
//		 * @since 3.0.0
//		 *
//		 * @access public
//		 *
//		 * @param mixed $output Passed by reference. Used to append additional content.
//		 * @param mixed $item Menu item data object.
//		 * @param int $depth (default: 0) Depth of menu item. Used for padding.
//		 * @param array $args (default: array()) Arguments.
//		 * @param int $id (default: 0) Menu item ID.
//		 *
//		 * @return void
//		 */
////		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
////			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
////			/**
////			 * Dividers, Headers or Disabled
////			 * =============================
////			 * Determine whether the item is a Divider, Header, Disabled or regular
////			 * menu item. To prevent errors we use the strcasecmp() function to so a
////			 * comparison that is not case sensitive. The strcasecmp() function returns
////			 * a 0 if the strings are equal.
////			 */
////			if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
////				$output .= $indent . '<li role="presentation" class="divider">';
////			} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
////				$output .= $indent . '<li role="presentation" class="divider">';
////			} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
////				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
////			} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
////				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
////			} else {
////				$value       = '';
////				$class_names = $value;
////				$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
//////				$classes[]   = 'menu-item-' . $item->ID;
////				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
////				if ( $args->has_children ) {
////					$class_names .= ' dropdown';
////				}
//////				if ($depth) {
//////					$class_names = ' dropdown-menu';
//////				}
////				if ( in_array( 'current-menu-item', $classes, true ) ) {
////					$class_names .= ' active';
////				}
////				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
////				$id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
////				$id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';
////				$output      .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $value . $class_names . '>';
////				$atts        = array();
////				if ( empty( $item->attr_title ) ) {
////					$atts['title'] = ! empty( $item->title ) ? strip_tags( $item->title ) : '';
////				} else {
////					$atts['title'] = $item->attr_title;
////				}
////				$atts['target'] = ! empty( $item->target ) ? $item->target : '';
////				$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
////				// If item has_children add atts to a.
////				if ( $args->has_children && 0 === $depth ) {
////					$atts['href']          = '#';
////					$atts['data-toggle']   = 'dropdown';
////					$atts['class']         = 'dropdown-toggle';
//////					$atts['aria-haspopup'] = 'true';
////				} else {
////					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
////				}
////				$atts            = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
////				$icon_attributes = '';
////				$attributes      = '';
////				foreach ( $atts as $attr => $value ) {
////					if ( ! empty( $value ) ) {
////						$value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
////						$attributes .= ' ' . $attr . '="' . $value . '"';
////						// if item has icon, we want all except title attributes because we
////						// want to avoid link title to be icon class.
////						if ( 'title' != $attr ) {
////							$icon_attributes .= ' ' . $attr . '="' . $value . '"';
////						}
////					}
////				}
////				$item_output = $args->before;
////				/*
////				 * Glyphicons/Font-Awesome
////				 * ===========
////				 * Since the the menu item is NOT a Divider or Header we check the see
////				 * if there is a value in the attr_title property. If the attr_title
////				 * property is NOT null we apply it as the class name for the glyphicon.
////				 */
////				if ( ! empty( $item->attr_title ) ) {
////					$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
////					if ( false !== $pos ) {
////						$item_output .= '<a' . $icon_attributes . ' title="' . esc_attr( $item->title ) . '"><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>';
////					} else {
////						$item_output .= '<a' . $icon_attributes . ' title="' . esc_attr( $item->title ) . '"><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i> ';
////					}
////				} else {
////					$item_output .= '<a' . $attributes . '>';
////				}
////				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
////				$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="fa fa-caret-down"></span></a>' : '</a>';
////				$item_output .= $args->after;
////				$output      .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
////			} // End if().
////		}
//		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
//			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
//				$t = '';
//				$n = '';
//			} else {
//				$t = "\t";
//				$n = "\n";
//			}
//			$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
//
//			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
//			$classes[] = 'menu-item-' . $item->ID;
//
//			/**
//			 * Filters the arguments for a single nav menu item.
//			 *
//			 * @since 4.4.0
//			 *
//			 * @param stdClass $args  An object of wp_nav_menu() arguments.
//			 * @param WP_Post  $item  Menu item data object.
//			 * @param int      $depth Depth of menu item. Used for padding.
//			 */
//			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
//
//			/**
//			 * Filters the CSS class(es) applied to a menu item's list item element.
//			 *
//			 * @since 3.0.0
//			 * @since 4.1.0 The `$depth` parameter was added.
//			 *
//			 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
//			 * @param WP_Post  $item    The current menu item.
//			 * @param stdClass $args    An object of wp_nav_menu() arguments.
//			 * @param int      $depth   Depth of menu item. Used for padding.
//			 */
//			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
//			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
//
//			/**
//			 * Filters the ID applied to a menu item's list item element.
//			 *
//			 * @since 3.0.1
//			 * @since 4.1.0 The `$depth` parameter was added.
//			 *
//			 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
//			 * @param WP_Post  $item    The current menu item.
//			 * @param stdClass $args    An object of wp_nav_menu() arguments.
//			 * @param int      $depth   Depth of menu item. Used for padding.
//			 */
//			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
//			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
//
//			$output .= $indent . '<li' . $id . $class_names .'>';
//
//			$atts = array();
//			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
//			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
//			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
//			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
//
//			/**
//			 * Filters the HTML attributes applied to a menu item's anchor element.
//			 *
//			 * @since 3.6.0
//			 * @since 4.1.0 The `$depth` parameter was added.
//			 *
//			 * @param array $atts {
//			 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
//			 *
//			 *     @type string $title  Title attribute.
//			 *     @type string $target Target attribute.
//			 *     @type string $rel    The rel attribute.
//			 *     @type string $href   The href attribute.
//			 * }
//			 * @param WP_Post  $item  The current menu item.
//			 * @param stdClass $args  An object of wp_nav_menu() arguments.
//			 * @param int      $depth Depth of menu item. Used for padding.
//			 */
//			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
//
//			$attributes = '';
//			foreach ( $atts as $attr => $value ) {
//				if ( ! empty( $value ) ) {
//					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
//					$attributes .= ' ' . $attr . '="' . $value . '"';
//				}
//			}
//
//			/** This filter is documented in wp-includes/post-template.php */
//			$title = apply_filters( 'the_title', $item->title, $item->ID );
//
//			/**
//			 * Filters a menu item's title.
//			 *
//			 * @since 4.4.0
//			 *
//			 * @param string   $title The menu item's title.
//			 * @param WP_Post  $item  The current menu item.
//			 * @param stdClass $args  An object of wp_nav_menu() arguments.
//			 * @param int      $depth Depth of menu item. Used for padding.
//			 */
//			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
//
//			$item_output = $args->before;
//			$item_output .= '<a'. $attributes .'>';
//			$item_output .= $args->link_before . $title . $args->link_after;
//			$item_output .= '</a>';
//			$item_output .= $args->after;
//
//			/**
//			 * Filters a menu item's starting output.
//			 *
//			 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
//			 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
//			 * no filter for modifying the opening and closing `<li>` for a menu item.
//			 *
//			 * @since 3.0.0
//			 *
//			 * @param string   $item_output The menu item's starting HTML output.
//			 * @param WP_Post  $item        Menu item data object.
//			 * @param int      $depth       Depth of menu item. Used for padding.
//			 * @param stdClass $args        An object of wp_nav_menu() arguments.
//			 */
//			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//		}
//
//		public function end_lvl( &$output, $depth = 0, $args = array() ) {
//			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
//				$t = '';
//				$n = '';
//			} else {
//				$t = "\t";
//				$n = "\n";
//			}
//			$indent = str_repeat( $t, $depth );
//			$output .= "$indent</ul>{$n}";
//		}
//
//		/**
//		 * Traverse elements to create list from elements.
//		 *
//		 * Display one element if the element doesn't have any children otherwise,
//		 * display the element and its children. Will only traverse up to the max
//		 * depth and no ignore elements under that depth.
//		 *
//		 * This method shouldn't be called directly, use the walk() method instead.
//		 *
//		 * @see Walker::start_el()
//		 * @since 2.5.0
//		 *
//		 * @access public
//		 *
//		 * @param mixed $element Data object.
//		 * @param mixed $children_elements List of elements to continue traversing.
//		 * @param mixed $max_depth Max depth to traverse.
//		 * @param mixed $depth Depth of current element.
//		 * @param mixed $args Arguments.
//		 * @param mixed $output Passed by reference. Used to append additional content.
//		 *
//		 * @return null Null on failure with no changes to parameters.
//		 */
////		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
////			if ( ! $element ) {
////				return;
////			}
////			$id_field = $this->db_fields['id'];
////			// Display this element.
////			if ( is_object( $args[0] ) ) {
////				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
////			}
////			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
////		}
//
//		/**
//		 * Menu Fallback
//		 * =============
//		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
//		 * and a menu has not been assigned to the theme location in the WordPress
//		 * menu manager the function with display nothing to a non-logged in user,
//		 * and will add a link to the WordPress menu manager if logged in as an admin.
//		 *
//		 * @param array $args passed from the wp_nav_menu function.
//		 */
//		public static function fallback( $args ) {
//			if ( current_user_can( 'edit_theme_options' ) ) {
//				/* Get Arguments. */
//				$container       = $args['container'];
//				$container_id    = $args['container_id'];
//				$container_class = $args['container_class'];
//				$menu_class      = $args['menu_class'];
//				$menu_id         = $args['menu_id'];
//				if ( $container ) {
//					echo '<' . esc_attr( $container );
//					if ( $container_id ) {
//						echo ' id="' . esc_attr( $container_id ) . '"';
//					}
//					if ( $container_class ) {
//						echo ' class="' . esc_attr( $container_class ) . '"';
//					}
//					echo '>';
//				}
//				echo '<ul';
//				if ( $menu_id ) {
//					echo ' id="' . esc_attr( $menu_id ) . '"';
//				}
//				if ( $menu_class ) {
//					echo ' class="' . esc_attr( $menu_class ) . '"';
//				}
//				echo '>';
//				echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="">' . esc_attr( 'Add a menu', '' ) . '</a></li>';
//				echo '</ul>';
//				if ( $container ) {
//					echo '</' . esc_attr( $container ) . '>';
//				}
//			}
//		}
//	}
	class WP_Bootstrap_Navwalker extends Walker {
		/**
		 * What the class handles.
		 *
		 * @since 3.0.0
		 * @var string
		 *
		 * @see Walker::$tree_type
		 */
		public $tree_type = array( 'post_type', 'taxonomy', 'custom' );

		/**
		 * Database fields to use.
		 *
		 * @since 3.0.0
		 * @todo Decouple this.
		 * @var array
		 *
		 * @see Walker::$db_fields
		 */
		public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

		/**
		 * Starts the list before the elements are added.
		 *
		 * @since 3.0.0
		 *
		 * @see Walker::start_lvl()
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param int      $depth  Depth of menu item. Used for padding.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = str_repeat( $t, $depth );

			// Default class.
			$classes = array( 'sub-menu' );

			/**
			 * Filters the CSS class(es) applied to a menu list element.
			 *
			 * @since 4.8.0
			 *
			 * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
			 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 */
			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$output .= "{$n}{$indent}<ul$class_names>{$n}";
		}

		/**
		 * Ends the list of after the elements are added.
		 *
		 * @since 3.0.0
		 *
		 * @see Walker::end_lvl()
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param int      $depth  Depth of menu item. Used for padding.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = str_repeat( $t, $depth );
			$output .= "$indent</ul>{$n}";
		}

		/**
		 * Starts the element output.
		 *
		 * @since 3.0.0
		 * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
		 *
		 * @see Walker::start_el()
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param WP_Post  $item   Menu item data object.
		 * @param int      $depth  Depth of menu item. Used for padding.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 * @param int      $id     Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			/**
			 * Filters the arguments for a single nav menu item.
			 *
			 * @since 4.4.0
			 *
			 * @param stdClass $args  An object of wp_nav_menu() arguments.
			 * @param WP_Post  $item  Menu item data object.
			 * @param int      $depth Depth of menu item. Used for padding.
			 */
			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

			/**
			 * Filters the CSS class(es) applied to a menu item's list item element.
			 *
			 * @since 3.0.0
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
			 * @param WP_Post  $item    The current menu item.
			 * @param stdClass $args    An object of wp_nav_menu() arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 */
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			/**
			 * Filters the ID applied to a menu item's list item element.
			 *
			 * @since 3.0.1
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
			 * @param WP_Post  $item    The current menu item.
			 * @param stdClass $args    An object of wp_nav_menu() arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 */
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

			/**
			 * Filters the HTML attributes applied to a menu item's anchor element.
			 *
			 * @since 3.6.0
			 * @since 4.1.0 The `$depth` parameter was added.
			 *
			 * @param array $atts {
			 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
			 *
			 *     @type string $title  Title attribute.
			 *     @type string $target Target attribute.
			 *     @type string $rel    The rel attribute.
			 *     @type string $href   The href attribute.
			 * }
			 * @param WP_Post  $item  The current menu item.
			 * @param stdClass $args  An object of wp_nav_menu() arguments.
			 * @param int      $depth Depth of menu item. Used for padding.
			 */
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			/** This filter is documented in wp-includes/post-template.php */
			$title = apply_filters( 'the_title', $item->title, $item->ID );

			/**
			 * Filters a menu item's title.
			 *
			 * @since 4.4.0
			 *
			 * @param string   $title The menu item's title.
			 * @param WP_Post  $item  The current menu item.
			 * @param stdClass $args  An object of wp_nav_menu() arguments.
			 * @param int      $depth Depth of menu item. Used for padding.
			 */
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			/**
			 * Filters a menu item's starting output.
			 *
			 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
			 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
			 * no filter for modifying the opening and closing `<li>` for a menu item.
			 *
			 * @since 3.0.0
			 *
			 * @param string   $item_output The menu item's starting HTML output.
			 * @param WP_Post  $item        Menu item data object.
			 * @param int      $depth       Depth of menu item. Used for padding.
			 * @param stdClass $args        An object of wp_nav_menu() arguments.
			 */
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		/**
		 * Ends the element output, if needed.
		 *
		 * @since 3.0.0
		 *
		 * @see Walker::end_el()
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param WP_Post  $item   Page data object. Not used.
		 * @param int      $depth  Depth of page. Not Used.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public function end_el( &$output, $item, $depth = 0, $args = array() ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$output .= "</li>{$n}";
		}

	} // Walker_Nav_Menu

} // End if().
<?php
defined('ABSPATH') || exit;

/* Check if Class Exists. */
if (!class_exists('WP_Bootstrap_Navwalker')) {
    /**
     * WP_Bootstrap_Navwalker class.
     *
     * @extends Walker_Nav_Menu
     */
    class WP_Bootstrap_Navwalker extends Walker_Nav_Menu
    {
        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
        {
            $object = $item->object;
            $type = $item->type;
            $title = '<span>' . $item->title . '</span>';
            $description = $item->description;
            $permalink = $item->url;

            $output .= "<li class='" . implode(' ', $item->classes) . "'>";
            //Add SPAN if no Permalink
            if ($permalink && $permalink != '#') {
                $output .= '<a href="' . $permalink . '">';
            } else {
                $output .= '<span>';
            }

            $output .= $title;

            if ($description != '' && $depth == 0) {
                $output .= '<small class="description">' . $description . '</small>';
            }

            if ($permalink && $permalink != '#') {
                $output .= '</a>';
            } else {
                $output .= '</span>';
            }
        }
    }
}

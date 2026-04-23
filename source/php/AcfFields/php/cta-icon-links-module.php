<?php

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(
        array(
        'key' => 'group_cta-icon-links_module',
        'title' => __('CTA icon links module', 'modularity-cta-icon-links'),
        'fields' => array(
            array(
                'key' => 'field_cil_67a2b3c4d01',
                'label' => __('Columns', 'modularity-cta-icon-links'),
                'name' => 'columns',
                'type' => 'select',
                'instructions' => __('Number of columns on large screens. One column is used on small screens.', 'modularity-cta-icon-links'),
                'required' => 0,
                'choices' => array(
                    1 => __('1 column', 'modularity-cta-icon-links'),
                    2 => __('2 columns', 'modularity-cta-icon-links'),
                    3 => __('3 columns', 'modularity-cta-icon-links'),
                    4 => __('4 columns', 'modularity-cta-icon-links'),
                ),
                'default_value' => 2,
                'return_format' => 'value',
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'field_cil_67a2b3c4d02',
                'label' => __('Items', 'modularity-cta-icon-links'),
                'name' => 'items',
                'type' => 'repeater',
                'instructions' => __('Add icon links. Each item is a full card with its own background colour.', 'modularity-cta-icon-links'),
                'layout' => 'block',
                'min' => 0,
                'button_label' => __('Add item', 'modularity-cta-icon-links'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_cil_67a2b3c4d04',
                        'label' => __('Link', 'modularity-cta-icon-links'),
                        'name' => 'link',
                        'type' => 'link',
                        'instructions' => __('The link text becomes the card label.', 'modularity-cta-icon-links'),
                        'required' => 1,
                        'return_format' => 'array',
                        'parent_repeater' => 'field_cil_67a2b3c4d02',
                        'wrapper' => array('width' => '100'),
                    ),
                    array(
                        'key' => 'field_cil_67a2b3c4d05',
                        'label' => __('Icon', 'modularity-cta-icon-links'),
                        'name' => 'icon',
                        'type' => 'icon',
                        'parent_repeater' => 'field_cil_67a2b3c4d02',
                        'wrapper' => array('width' => '50'),
                    ),
                    array(
                        'key' => 'field_cil_67a2b3c4d06',
                        'label' => __('Card background', 'modularity-cta-icon-links'),
                        'name' => 'background',
                        'type' => 'color_picker',
                        'default_value' => '#f5f0e8',
                        'enable_opacity' => 0,
                        'return_format' => 'string',
                        'parent_repeater' => 'field_cil_67a2b3c4d02',
                        'wrapper' => array('width' => '50'),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'mod-cta-icon-links',
                ),
            ),
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/cta-icon-links',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'active' => true,
        'show_in_rest' => 0,
        )
    );
}

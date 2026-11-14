<?php

function mytheme_enqueue_assets() {

    $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';

    if ( ! file_exists( $manifest_path ) ) {
        return;
    }

    $manifest = json_decode(
        file_get_contents( $manifest_path ),
        true
    );

    $entry = $manifest['src/js/main.jsx'] ?? null;

    if ( ! $entry ) {
        return;
    }

    // Load compiled CSS
    if ( ! empty( $entry['css'] ) ) {
        foreach ( $entry['css'] as $index => $css ) {
            wp_enqueue_style(
                'mytheme-style-' . $index,
                get_template_directory_uri() . '/dist/' . $css,
                array(),
                filemtime( get_template_directory() . '/dist/' . $css )
            );
        }
    }

    // Load compiled React JavaScript
    wp_enqueue_script(
        'mytheme-react',
        get_template_directory_uri() . '/dist/' . $entry['file'],
        array(),
        filemtime( get_template_directory() . '/dist/' . $entry['file'] ),
        true
    );
}

add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_assets' );

function mytheme_module_script( $tag, $handle, $src ) {

    if ( 'mytheme-react' === $handle ) {
        return '<script type="module" src="' . esc_url( $src ) . '"></script>';
    }

    return $tag;
}

add_filter( 'script_loader_tag', 'mytheme_module_script', 10, 3 );

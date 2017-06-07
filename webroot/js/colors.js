'use strict';
/**
 * @author Batch Themes Ltd.
 */
function get_palette() {
    var background = $('body').attr('data-background');
    return get_palettes()[background];
}
function get_palettes() {
    return {
        "light": {
            "background-color": "#fff",
            "odd-color": "#fafafa",
            "even-color": "#f5f5f5",
            "hover-color": "#f0f0f0",
            "border-color": "#ebebeb",
            "color": "#212121",
            "highlight-color": "#ffa000",
            "alt-highlight-color": "#303f9f",
        },
        "dark": {
            "background-color": "#212121",
            "odd-color": "#262626",
            "even-color": "#2b2b2b",
            "hover-color": "#2e2e2e",
            "border-color": "#303030",
            "color": "#f5f5f5",
            "highlight-color": "#ffa000",
            "alt-highlight-color": "#303f9f",
        },
        "indigo": {
            "background-color": "#1a237e",
            "odd-color": "#1c2586",
            "even-color": "#1d288f",
            "hover-color": "#1e2993",
            "border-color": "#1f2a97",
            "color": "#f5f5f5",
            "highlight-color": "#ffa000",
            "alt-highlight-color": "#303f9f",
        },
        "blue-grey": {
            "background-color": "#263238",
            "odd-color": "#2a373e",
            "even-color": "#2e3d44",
            "hover-color": "#304047",
            "border-color": "#32424a",
            "color": "#f5f5f5",
            "highlight-color": "#ffa000",
            "alt-highlight-color": "#303f9f",
        }
    }
}
function background_colors() {
    return {
        "white": "#ffffff",
        "light": "#f5f5f5",
        "dark": "#212121",
        "indigo": "#1a237e",
        "blue-grey": "#263238",
    }
}
function bootstrap_colors() {
    return {
        "light": "#f5f5f5",
        "dark": "#212121",
        "default": "#424242",
        "primary": "#303f9f",
        "secondary": "#00796b",
        "info": "#1976d2",
        "success": "#388e3c",
        "warning": "#ffa000",
        "danger": "#b71c1c",
    }
}

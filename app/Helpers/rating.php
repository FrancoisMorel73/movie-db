<?php

if (!function_exists('generateStars')) {
    /**
     * Génère les étoiles de notation en HTML.
     *
     * @param  float $rating La note à afficher.
     * @return string Le HTML des étoiles.
     */
    function generateStars($rating) {
        $fullStars = floor($rating);
        $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
        $emptyStars = 5 - $fullStars - $halfStar;

        $stars = str_repeat('<i class="bi bi-star-fill text-yellow-500"></i>', $fullStars);
        if ($halfStar) {
            $stars .= '<i class="bi bi-star-half text-yellow-500"></i>';
        }
        $stars .= str_repeat('<i class="bi bi-star text-gray-300"></i>', $emptyStars);

        return $stars;
    }
}

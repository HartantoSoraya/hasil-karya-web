<x-layouts.app title="Home">
    <x-ui.landing-banner :banners="$banners" />

    <x-ui.landing-about />

    <x-ui.landing-services :services="$services" />

    <x-ui.landing-project :projects="$projects" :projectCategories="$projectCategories" />

    <x-ui.landing-gallery :galleries="$galleries" />

    <x-ui.landing-faq :faqs="$faqs" :testimonials="$testimonials" />

    <x-ui.landing-blog :blogs="$blogs" />

    <x-ui.landing-client :clients="$clients" />

</x-layouts.app>

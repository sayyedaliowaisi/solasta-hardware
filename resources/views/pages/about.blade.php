@extends('layouts.app')

@section(
    'title',
    'About Us | ' . ($siteSettings->company_name ?: 'M R Hardware')
)

@section('content')

@php
    $heroSection =
        $aboutSections->get('hero');

    $companyStorySection =
        $aboutSections->get('company_story');

    $missionVisionSection =
        $aboutSections->get('mission_vision');

    $whyChooseSection =
        $aboutSections->get('why_choose');

    $journeySection =
        $aboutSections->get('journey');

    $teamSection =
        $aboutSections->get('team');

    $industriesSection =
        $aboutSections->get('industries');

    $trustedBrandSection =
        $aboutSections->get('trusted_brand');

    $ctaSection =
        $aboutSections->get('cta');
@endphp


{{-- =========================================================
    HERO
========================================================= --}}
@if($heroSection)

    @include(
        'components.About Us Component.hero',
        [
            'section' => $heroSection
        ]
    )

@endif


{{-- =========================================================
    COMPANY STORY
========================================================= --}}
@if($companyStorySection)

    @include(
        'components.About Us Component.companystory',
        [
            'section' => $companyStorySection
        ]
    )

@endif


{{-- =========================================================
    MISSION & VISION
========================================================= --}}
@if($missionVisionSection)

    @include(
        'components.About Us Component.Mision&visions',
        [
            'section' => $missionVisionSection
        ]
    )

@endif


{{-- =========================================================
    WHY CHOOSE US
========================================================= --}}
@if($whyChooseSection)

    @include(
        'components.About Us Component.why-choose-us',
        [
            'section' => $whyChooseSection
        ]
    )

@endif


{{-- =========================================================
    OUR JOURNEY
========================================================= --}}
@if($journeySection)

    @include(
        'components.About Us Component.our-journey',
        [
            'section' => $journeySection
        ]
    )

@endif


{{-- =========================================================
    OUR TEAM
========================================================= --}}
@if($teamSection)

    @include(
        'components.About Us Component.our-team',
        [
            'section' => $teamSection
        ]
    )

@endif


{{-- =========================================================
    INDUSTRIES
========================================================= --}}
@if($industriesSection)

    @include(
        'components.About Us Component.industries-serve',
        [
            'section' => $industriesSection
        ]
    )

@endif


{{-- =========================================================
    TRUSTED BRAND
========================================================= --}}
@if($trustedBrandSection)

    @include(
        'components.About Us Component.trusted-brand',
        [
            'section' => $trustedBrandSection
        ]
    )

@endif


{{-- =========================================================
    CTA
========================================================= --}}
@if($ctaSection)

    @include(
        'components.About Us Component.cta',
        [
            'section' => $ctaSection
        ]
    )

@endif

@endsection

@php
    if (!isset($isColumn6)) {
        $isColumn6 = false;
    }
@endphp

<div class="{{ $isColumn6 ? 'col-lg-6' : 'col-lg-12' }}">
    <div class="job-box @if ($job->is_saved) bookmark-post @endif card mt-4"
        data-latitude="{{ $job->latitude }}"
        data-longitude="{{ $job->longitude }}"  
        data-company_logo_thumb="{{ $job->company->logo_thumb }}"
        data-company_name="{{ $job->company_name ?: $job->name }}"
        data-map_icon="{{ $job->salary_text }}"
        data-job_name="{{ $job->name }}"
        data-company_url="{{ $job->company_url }}"
        data-job_types="{{ json_encode($job->jobTypes->toArray()) }}"
        data-number_of_positions="{{ $job->number_of_positions }}"
        data-full_address="{{ $job->full_address }}">
        <!-- @if ($job->canShowSavedJob())
            <div class="bookmark-label text-center">
                <a class="job-bookmark-action align-middle text-white"
                    data-job-id="{{ $job->id }}"
                    href="{{ route('public.account.jobs.saved.action') }}">
                    <i class="mdi mdi-star"></i>
                </a>
            </div>
        @endif -->
        @if ($job->is_featured)
            <!-- <div class="featured-label">
                <span class="featured">{{ __('featured') }}</span>
            </div> -->
        @endif
        <div class="p-4 position-relative">
            <!-- @if ($job->applicants_count)
                <div class="job-applied-count"><i class="mdi mdi-fire text-danger"></i> <small class="fw-medium">{{ __(':count application(s)', ['count' => $job->applicants_count]) }}</small></div>
            @endif -->

            <div class="row align-items-center g-lg-3 g-md-2 cursor-pointer" data-toggle="clickable" data-url="{{ $job->url }}">
                <!-- <div class="col-md-2">
                    <div class="text-center mb-4 mb-md-0">
                        <a href="{{ $job->company_url ?: 'javascript:void(0);' }}">
                            <img src="{{ $job->company_logo_thumb }}" alt="{{ $job->company_name ?: $job->name }}"
                                width="55" class="img-fluid rounded-5">
                        </a>
                    </div>
                </div> -->
                <!--end col-->
                <div class="d-flex job__item__header">
                    <div>
                        <a href="{{ $job->company_url ?: 'javascript:void(0);' }}">
                            <img src="{{ $job->company_logo_thumb }}" alt="{{ $job->company_name ?: $job->name }}"
                                width="55" class="img-fluid rounded-5">
                        </a>
                    </div>
                    <div class="mb-2 mb-md-0 ms-3 w-100">
                        <h3 class="fs-18 mb-1 h5">
                            <a href="{{ $job->url }}" class="text-dark job_name">{{ $job->name }}</a>
                        </h3>
                        <div class="job-info">
                            @if ($job->has_company)
                                <span class="fs-14 mb-0 company_name">{{ $job->company->name }}</span>
                            @endif
                            @if ($job->location)
                                <span class="mb-0">
                                    <i class="uil uil-map-marker"></i>
                                    {{ $job->location }}
                                </span>
                            @endif
                            @if ($job->jobTypes->count())
                                @foreach($job->jobTypes as $jobType)
                                    <span>
                                        <i class="uil uil-bag-alt"></i>
                                        {{ $jobType->name }}@if (!$loop->last), @endif
                                    </span>
                                @endforeach
                            @endif
                            @if ($job->created_at->diffForHumans())
                                <span>
                                    <i class="uil uil-clock-eight"></i>
                                    {{ $job->created_at->diffForHumans() }}
                                </span>
                            @endif
                            <!-- <span class="text-primary salary_text">{{ $job->salary_text }}</span> -->
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-muted mb-0 job_description">
                        {{ $job->description }}
                    </p>
                </div>
                <!--end col-->
                <!--test col-->
                <!-- <div class="col-md-3">
                    @if ($job->location)
                        <div class="d-flex mb-2">
                            <div class="d-flex mb-2">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-map-marker text-primary me-1"></i>
                                </div>
                                <p class="text-muted mb-0">
                                    {{ $job->location }}
                                </p>
                            </div>
                        </div>
                    @endif

                    {!! apply_filters('job-item-extra-data', null, $job) !!}
                </div> -->
                <!--end col-->
                <!-- <div class="col-md-2">
                    <div>
                        <p class="text-muted mb-2">
                            <span class="text-primary">{{ $job->salary_text }}</span>
                        </p>
                    </div>
                </div> -->
                <!--end col-->
                <!-- @if ($job->jobTypes->count())
                    <div class="col-md-2">
                    </div>
                @endif -->
            </div>
            <div class="row mt-4">
                <div class="col-md-10">
                    <div class="d-flex">
                        @if($job->tags->isNotEmpty())
                            <div class="mt-3">
                                @foreach($job->tags->take(5) as $tag)
                                    <a href="{{ $tag->url }}">
                                        <span class="btn-small background-6 disc-btn me-2">{{ $tag->name }}</span>
                                    </a>
                                @endforeach
                                @if ($job->is_featured)
                                    <span class="btn-small background-6 disc-btn cursor-pointer">{{ __('featured') }}</span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-2 col-md-3">
                    @if ($job->canShowApplyJob())
                        <div class="text-start text-md-end">
                            @if ($job->is_applied)
                                <a href="{{ $job->url }}" class="primary-link text-success">
                                    <span>{{ __('Applied') }}</span>
                                    <i class="uil uil-check-circle"></i>
                                </a>
                            @else
                                <!-- @if ($job->apply_url)
                                    <a href="#applyExternalJob" data-bs-toggle="modal" class="primary-link" data-job-name="{{ $job->name }}" data-job-id="{{ $job->id }}">
                                        <span>{{ __('Apply Now') }}</span>
                                        <i class="mdi mdi-chevron-double-right"></i>
                                    </a>
                                @elseif (!auth('account')->check() && !JobBoardHelper::isGuestApplyEnabled())
                                    <a href="{{ route('public.account.login') }}"
                                    class="primary-link">
                                        <span>{{ __('Apply Now') }}</span>
                                        <i class="mdi mdi-chevron-double-right"></i>
                                    </a>
                                @else
                                    <a href="#applyNow" data-bs-toggle="modal" class="primary-link" data-job-name="{{ $job->name }}" data-job-id="{{ $job->id }}">
                                        <span>{{ __('Apply Now') }}</span>
                                        <i class="mdi mdi-chevron-double-right"></i>
                                    </a>
                                @endif -->
                            @endif
                        </div>
                    @endif
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
</div>

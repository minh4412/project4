<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('WD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('White Dashboard') }}</a>
        </div>
        <ul class="nav">
            @if (Session::get('role') == 1)
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Other Manager') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'student') class="active " @endif>
                            <a href="{{ route('student.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('User Management') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'course') class="active " @endif>
                            <a href="{{ route('course.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Course') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'class') class="active " @endif>
                            <a href="{{ route('class.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Class') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'subject') class="active " @endif>
                <a href="{{ route('subject.index')  }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ _('Subject') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'major') class="active " @endif>
                <a href="{{ route('major.index')  }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ _('Major') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'book') class="active " @endif>
                <a href="{{ route('book.index')  }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ _('Book') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'bill') class="active " @endif>
                <a href="{{ route('bill.index')  }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Bill') }}</p>
                </a>
            </li>
            @else
            <li @if ($pageSlug == 'listbook') class="active " @endif>
                <a href="{{ route('listbook.index')  }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ _('List Book') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'purchase history') class="active " @endif>
                <a href="{{ route('history.index')  }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ _('Purchase history') }}</p>
                </a>
            </li>
            {{-- <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ _('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="#">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ _('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
            @endif
        </ul>
    </div>
</div>


<a class="dropdown-item" href="/cname"> Add Closers</a>

<a class="dropdown-item" href="/script"> Script</a>
                                        <a class="dropdown-item" href="/leads"> Leads</a>
                                        <a class="dropdown-item" href="/leadcallback"> Leads Call List

                                        @if(count($leadeds) >= 1)
                                        <span class="fa-stack bell fa-lg has-badge" data-count="{{count($leadeds)}}">

<i class="fa fa-bell bell fa-stack-1x "></i>
    @endif





                                         </a>
                                        <a class="dropdown-item" href="/closers"> Residual </a>
                                        <a class="dropdown-item" href="/home"> Clients List </a>
                                        <a class="dropdown-item" href="/callback"> Clients Call List @if(count($clentss) >= 1)
                                        <span class="fa-stack bell fa-lg has-badge" data-count="{{count($clentss)}}">

<i class="fa fa-bell bell fa-stack-1x "></i>
    @endif</a>
                                        <a class="dropdown-item" href="/socialmedia"> Social Media</a>
                                        <a class="dropdown-item" href="/reviewmanagment"> Review Managment</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

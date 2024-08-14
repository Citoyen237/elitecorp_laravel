<!-- ======= Sidebar ======= -->
@php
$currentUrl = url()->current();
@endphp
<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav " id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed active" href="{{route('admin.index')}}">
                <i class="bi bi-grid"></i>
                <span>Abonnements utilisateur</span>
            </a>
        </li><!-- End Dashboard Nav -->
        {{-- <li class="nav-item">
            <!-- collapsed pour inverser l'icone -->
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Abonnements utilisateur</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <!-- chow dans le ul pour roule -->
            <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="icons-bootstrap.html">
                        <i class="bi bi-circle"></i><span>Liste</span>
                    </a>
                </li>

            </ul>
        </li> --}}
        <li class="nav-item collapsed">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Abonnements</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {% if  current_url in urlsA %}show{% endif %} " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('admin.spack.list')}}" class="">
                        <i class="bi bi-circle"></i><span>Liste</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Accordion</span>
                    </a>
                </li> -->
            </ul>
        </li><!-- End Abonements Nav -->

        <li class="nav-item">
            <!-- manipulation des urls -->
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Ecoles</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('admin.school.list')}}" class="">
                        <i class="bi bi-circle"></i><span>Ecole</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.cursus.list')}}" class="">
                        <i class="bi bi-circle"></i><span>Curcus</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.level.list')}}" class="">
                        <i class="bi bi-circle"></i><span>Niveaux</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.stream.list')}}" class="">
                        <i class="bi bi-circle"></i><span>Filieres</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.test.list')}}" class="">
                        <i class="bi bi-circle"></i><span>Epreuves</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Ecoles Nav -->

        <li class="nav-item ">
            <a class="nav-link collapsed"  data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Blogs</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('admin.blog.article')}}" class="">
                        <i class="bi bi-circle"></i><span>Articles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.category')}}"  class="">
                        <i class="bi bi-circle"></i><span>Categories</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Blog Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Cours/Message</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.cour.list')}}" class="">
                        <i class="bi bi-circle"></i><span>Cours</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.message.list')}}" class="">
                        <i class="bi bi-circle"></i><span>Messages</span>
                    </a>
                </li>
            </ul>
        </li><!-- End cours Nav -->



        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a class="nav-link collapsed active" href="{{ route('admin.users.list')}}">
                <i class="bi bi-people"></i>
                <span>Utilisateurs</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.temoignage.list')}}">
                <i class="bi bi-person"></i>
                <span>Temoignages</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('indexF')}}">
                <i class="bi bi-house-door"></i>
                <span>Accueil</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item" wire:click="logout()">
            <a class="nav-link collapsed text-danger">
                <i class="bi bi-box-arrow-in-right"></i>
                <span wire:click="logout()">Deconnexion</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

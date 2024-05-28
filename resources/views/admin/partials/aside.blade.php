<aside class="bg-dark navbar-dark text-white">
    <nav class="d-flex flex-column justify-content-between h-100">
        <ul class="d-flex flex-column align-items-start mt-3">
            <div>
                <li>
                    <a href="{{ route('admin.home') }}">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.projects.index') }}">
                        <i class="fa-solid fa-database"></i>
                        <span>Projects</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.projects.create') }}">
                        <i class="fa-solid fa-square-plus"></i>
                        <span>Add New Project</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.technologies.index') }}">
                        <i class="fa-solid fa-microchip"></i>
                        <span>Technologies</span>

                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.types.index') }}">
                        <i class="fa-solid fa-keyboard"></i>
                        <span>Type</span>
                    </a>
                </li>

                <li>
                    <a class="d-flex" href="{{ route('admin.technology_projects') }}">
                        <div class="me-2"><i class="fa-solid fa-bars-staggered"></i></div>
                        <span>List Technology & Project</span>
                    </a>
                </li>
            </div>

        </ul>
        <div class="mb-3">
            <ul>
                <li  >
                    <a href="#">
                        <i class="fa-solid fa-gear"></i>
                        <i>Settings</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>

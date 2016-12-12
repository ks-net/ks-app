<nav class="navbar navbar-full navbar-fixed-top second-navbar navbar-dark  bg-inverse">
    <?=
    $this->Html->image(
            'ks-logo.png', [
        'alt' => 'ks app logo',
        'class' => 'navbar-brand',
        'url' => '/'
            ]
    )
    ?>

    <button
        class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">

    </button>

    <div class="collapse navbar-toggleable-md" id="navbarResponsive">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="fa fa-dashboard "></span>
                    cpanel
                </a>
            </li>

            <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle"></i>
                    <?= __('Users') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                    <?=
                    $this->Html->link(
                            $this->Html->tag(
                                    'i', '', [
                                'class' => 'fa fa-user fa-mr-3px'
                            ]) . __('List Users'), [
                        'controller' => 'Articles', 'action' => 'index'
                            ], [
                        'class' => 'dropdown-item', 'escape' => false
                            ]
                    )
                    ?>

                    <?=
                    $this->Html->link(
                            $this->Html->tag(
                                    'i', '', [
                                'class' => 'fa fa-user-plus fa-mr-3px'
                            ]) . __('Add User'), [
                        'controller' => 'Articles',
                        'action' => 'add'
                            ], [
                        'class' => 'dropdown-item',
                        'escape' => false
                            ]
                    )
                    ?>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">
                        <i class="fa fa-users"></i>
                        <?= __('List Groups') ?>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-users"></i>
                        <i class="fa fa-plus fa-sm fa-middle"></i>
                        <?= __('new Group') ?>
                    </a>
                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-picture-o"></i>
                    <?= __('Media') ?></a>
                <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                    <?=
                    $this->Html->link(
                            $this->Html->tag(
                                    'i', '', [
                                'class' => 'fa fa-file-image-o fa-mr-3px'
                            ]) . __('List Media'), [
                        'controller' => 'Media', 'action' => 'index'
                            ], [
                        'class' => 'dropdown-item', 'escape' => false
                            ]
                    )
                    ?>

                    <?=
                    $this->Html->link(
                            $this->Html->tag(
                                    'i', '', [
                                'class' => 'fa fa-file-image-o fa-mr-3px'
                            ]).$this->Html->tag(
                                    'i', '', [
                                'class' => 'fa fa-plus fa-sm fa-middle fa-mr-3px'
                            ]). __('Add new Media'), [
                        'controller' => 'Media', 'action' => 'add'
                            ], [
                        'class' => 'dropdown-item', 'escape' => false
                            ]
                    )
                    ?>

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-folder-open"></i>
                    <?= __('Content') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                    <?=
                    $this->Html->link(
                            $this->Html->tag(
                                    'i', '', [
                                'class' => 'fa fa-file-text fa-mr-3px'
                            ]) . __('List Articles'), [
                        'controller' => 'Articles', 'action' => 'index'
                            ], [
                        'class' => 'dropdown-item', 'escape' => false
                            ]
                    )
                    ?>

                    <?=
                    $this->Html->link(
                            $this->Html->tag(
                                    'i', '', [
                                'class' => 'fa fa-file-text fa-mr-3px'
                            ]).$this->Html->tag(
                                    'i', '', [
                                'class' => 'fa fa-plus fa-sm fa-middle fa-mr-3px'
                            ]) . __('Add new Article'), [
                        'controller' => 'Articles', 'action' => 'add'
                            ], [
                        'class' => 'dropdown-item', 'escape' => false
                            ]
                    )
                    ?>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="articles">
                        <i class="fa fa-folder"></i>
                        <?= __('List Categories') ?>
                    </a>
                    <a class="dropdown-item" href="articles/add">
                        <i class="fa fa-folder"></i>
                        <i class="fa fa-plus fa-sm fa-middle"></i>
                        <?= __('Add new Category') ?>
                    </a>
                </div>
            </li>
        </ul>

        <form class="form-inline float-lg-right">
            <input class="form-control" type="text" placeholder="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>

    </div>
</nav>

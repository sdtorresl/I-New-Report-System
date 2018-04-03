<script type="text/javascript">
    $('#menuUsers').addClass('active');
</script>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="header">
                <h4 class="title"><?= $user->first_name . ' ' . $user->last_name ?></h4>
                <p class="category"><?= strtoupper($user->role) ?></p>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4"><?= __('ID') ?></div>
                    <div class="col-md-8"><?= $user->id ?></div>
                </div>
                <div class="row">
                    <div class="col-md-4"><?= __('Email') ?></div>
                    <div class="col-md-8"><?= $user->email ?></div>
                </div>
                <div class="row">
                    <div class="col-md-4"><?= __('Created') ?></div>
                    <div class="col-md-8"><?= $user->created ?></div>
                </div>
                <div class="row">
                    <div class="col-md-4"><?= __('Modified') ?></div>
                    <div class="col-md-8"><?= $user->modified ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

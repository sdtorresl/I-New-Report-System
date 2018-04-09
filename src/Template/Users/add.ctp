<?php $this->Form->templates($form_templates['bootstrap']); ?>

<script type="text/javascript">
    $('#menuUsers').addClass('active');
</script>

<div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-12">
        <div class="card">
            <div class="header">
                <h4 class="title"><?= __('Add User') ?></h4>
                <p class="category"><?= __('Add a new user into report system') ?></p>
            </div>

            <div class="users form large-9 medium-8 columns content">
                <?= $this->Form->create($user); ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('email');
                        echo $this->Form->input('password');
                        echo $this->Form->input('first_name');
                        echo $this->Form->input('last_name');
                        echo $this->Form->input('role', ['type' => 'select', 'options' => $roles]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info btn-fill pull-right']) ?>
                <?= $this->Form->end() ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<?php $this->Form->templates($form_templates['bootstrap']); ?>

<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
		<div class="logo container-fluid">			
			<figure class="center-block">
				<?= $this->Html->image('logo-virgin.png', ['class' => 'center-block']) ?>
			</figure>		
		</div>

        <div class="card">
            <div class="header">
                <h4 class="title"><?= __('Login') ?></h4>
                <p class="category"><?= __('Sign in to I New Report System') ?></p>
            </div>

			<div class="form content">
				<?= $this->Form->create() ?>
				<?= $this->Form->input('email') ?>
				<?= $this->Form->input('password') ?>

				<?= $this->Flash->render() ?>
				
				<?= $this->Form->button(__('Login'), ['class' => 'btn btn-info btn-fill pull-right']) ?>
				<?= $this->Form->end() ?>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
</div>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Complaint $complaint
 */
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title"><?php echo $title; ?></h1>
		<h6 class="sub_title text-body-secondary"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars text-primary"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
							<li><?= $this->Html->link(__('Edit Complaint'), ['action' => 'edit', $complaint->id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Complaint'), ['action' => 'delete', $complaint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $complaint->id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Complaint'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Complaint'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
							</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

<div class="row">
	<div class="col-md-9">
		<div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
			<div class="card-body text-body-secondary">
            <h3><?= h($complaint->complaint_type) ?></h3>
    <div class="table-responsive">
        <table class="table">
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $complaint->hasValue('user') ? $this->Html->link($complaint->user->id, ['controller' => 'Users', 'action' => 'view', $complaint->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Faculty') ?></th>
                    <td><?= $complaint->hasValue('faculty') ? $this->Html->link($complaint->faculty->faculty_name, ['controller' => 'Faculties', 'action' => 'view', $complaint->faculty->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Complaint Type') ?></th>
                    <td><?= h($complaint->complaint_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($complaint->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Department Id') ?></th>
                    <td><?= $this->Number->format($complaint->department_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Number->format($complaint->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Number->format($complaint->modified) ?></td>
                </tr>
            </table>
            </div>
            <div class="text">
                <strong><?= __('Comment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($complaint->comment)); ?>
                </blockquote>
            </div>

			</div>
		</div>
		

            
            


		
	</div>
	<div class="col-md-3">
	  Column
	</div>
</div>





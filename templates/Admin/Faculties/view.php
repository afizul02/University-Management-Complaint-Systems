<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faculty $faculty
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
							<li><?= $this->Html->link(__('Edit Faculty'), ['action' => 'edit', $faculty->id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Faculty'), ['action' => 'delete', $faculty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faculty->id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Faculties'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Faculty'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
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
            <h3><?= h($faculty->faculty_name) ?></h3>
    <div class="table-responsive">
        <table class="table">
                <tr>
                    <th><?= __('Faculty Name') ?></th>
                    <td><?= h($faculty->faculty_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Faculty Code') ?></th>
                    <td><?= h($faculty->faculty_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($faculty->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($faculty->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Number->format($faculty->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Number->format($faculty->modified) ?></td>
                </tr>
            </table>
            </div>

			</div>
		</div>
		

            
            

            <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body text-body-secondary">
                <h4><?= __('Related Complaint') ?></h4>
                <?php if (!empty($faculty->complaint)) : ?>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Faculty Id') ?></th>
                            <th><?= __('Complaint Type') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($faculty->complaint as $complaint) : ?>
                        <tr>
                            <td><?= h($complaint->id) ?></td>
                            <td><?= h($complaint->user_id) ?></td>
                            <td><?= h($complaint->department_id) ?></td>
                            <td><?= h($complaint->faculty_id) ?></td>
                            <td><?= h($complaint->complaint_type) ?></td>
                            <td><?= h($complaint->comment) ?></td>
                            <td><?= h($complaint->created) ?></td>
                            <td><?= h($complaint->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Complaint', 'action' => 'view', $complaint->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Complaint', 'action' => 'edit', $complaint->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Complaint', 'action' => 'delete', $complaint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $complaint->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>

		
	</div>
	<div class="col-md-3">
	  Column
	</div>
</div>





<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usertype $usertype
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
							<li><?= $this->Html->link(__('Edit Usertype'), ['action' => 'edit', $usertype->id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Usertype'), ['action' => 'delete', $usertype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usertype->id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Usertypes'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Usertype'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
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
            <h3><?= h($usertype->user_type) ?></h3>
    <div class="table-responsive">
        <table class="table">
                <tr>
                    <th><?= __('User Type') ?></th>
                    <td><?= h($usertype->user_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Name') ?></th>
                    <td><?= h($usertype->user_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($usertype->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street1') ?></th>
                    <td><?= h($usertype->street1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street2') ?></th>
                    <td><?= h($usertype->street2) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($usertype->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($usertype->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($usertype->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usertype->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nric') ?></th>
                    <td><?= $this->Number->format($usertype->nric) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= $this->Number->format($usertype->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcode') ?></th>
                    <td><?= $this->Number->format($usertype->postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= $this->Number->format($usertype->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Number->format($usertype->modified) ?></td>
                </tr>
            </table>
            </div>

			</div>
		</div>
		

            
            


		
	</div>
	<div class="col-md-3">
	  Column
	</div>
</div>





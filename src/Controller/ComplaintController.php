<?php
declare(strict_types=1);

namespace App\Controller;

use AuditStash\Meta\RequestMetadata;
use Cake\Event\EventManager;
use Cake\Routing\Router;

/**
 * Complaint Controller
 *
 * @property \App\Model\Table\ComplaintTable $Complaint
 */
class ComplaintController extends AppController
{
	public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			'actions' => ['index'],
		]);
	}
	
	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);
	}

	/*public function viewClasses(): array
    {
        return [JsonView::class];
		return [JsonView::class, XmlView::class];
    }*/
	
	public function json()
    {
		$this->viewBuilder()->setLayout('json');
        $this->set('complaint', $this->paginate());
        $this->viewBuilder()->setOption('serialize', 'complaint');
    }
	
	public function csv()
	{
		$this->response = $this->response->withDownload('complaint.csv');
		$complaint = $this->Complaint->find();
		$_serialize = 'complaint';

		$this->viewBuilder()->setClassName('CsvView.Csv');
		$this->set(compact('complaint', '_serialize'));
	}
	
	public function pdfList()
	{
		$this->viewBuilder()->enableAutoLayout(false); 
        $this->paginate = [
            'contain' => ['Users', 'Faculties'],
			'maxLimit' => 10,
        ];
		$complaint = $this->paginate($this->Complaint);
		$this->viewBuilder()->setClassName('CakePdf.Pdf');
		$this->viewBuilder()->setOption(
			'pdfConfig',
			[
				'orientation' => 'portrait',
				'download' => true, 
				'filename' => 'complaint_List.pdf' 
			]
		);
		$this->set(compact('complaint'));
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$this->set('title', 'Complaint List');
		$this->paginate = [
			'maxLimit' => 10,
        ];
        $query = $this->Complaint->find('search', search: $this->request->getQueryParams())
            ->contain(['Users', 'Faculties']);
			//->where(['title IS NOT' => null])
        $complaint = $this->paginate($query);
		
		//count
		$this->set('total_complaint', $this->Complaint->find()->count());
		$this->set('total_complaint_archived', $this->Complaint->find()->where(['status' => 2])->count());
		$this->set('total_complaint_active', $this->Complaint->find()->where(['status' => 1])->count());
		$this->set('total_complaint_disabled', $this->Complaint->find()->where(['status' => 0])->count());
		
		//Count By Month
		$this->set('january', $this->Complaint->find()->where(['MONTH(created)' => date('1'), 'YEAR(created)' => date('Y')])->count());
		$this->set('february', $this->Complaint->find()->where(['MONTH(created)' => date('2'), 'YEAR(created)' => date('Y')])->count());
		$this->set('march', $this->Complaint->find()->where(['MONTH(created)' => date('3'), 'YEAR(created)' => date('Y')])->count());
		$this->set('april', $this->Complaint->find()->where(['MONTH(created)' => date('4'), 'YEAR(created)' => date('Y')])->count());
		$this->set('may', $this->Complaint->find()->where(['MONTH(created)' => date('5'), 'YEAR(created)' => date('Y')])->count());
		$this->set('jun', $this->Complaint->find()->where(['MONTH(created)' => date('6'), 'YEAR(created)' => date('Y')])->count());
		$this->set('july', $this->Complaint->find()->where(['MONTH(created)' => date('7'), 'YEAR(created)' => date('Y')])->count());
		$this->set('august', $this->Complaint->find()->where(['MONTH(created)' => date('8'), 'YEAR(created)' => date('Y')])->count());
		$this->set('september', $this->Complaint->find()->where(['MONTH(created)' => date('9'), 'YEAR(created)' => date('Y')])->count());
		$this->set('october', $this->Complaint->find()->where(['MONTH(created)' => date('10'), 'YEAR(created)' => date('Y')])->count());
		$this->set('november', $this->Complaint->find()->where(['MONTH(created)' => date('11'), 'YEAR(created)' => date('Y')])->count());
		$this->set('december', $this->Complaint->find()->where(['MONTH(created)' => date('12'), 'YEAR(created)' => date('Y')])->count());

		$query = $this->Complaint->find();

        $expectedMonths = [];
        for ($i = 11; $i >= 0; $i--) {
            $expectedMonths[] = date('M-Y', strtotime("-$i months"));
        }

        $query->select([
            'count' => $query->func()->count('*'),
            'date' => $query->func()->date_format(['created' => 'identifier', "%b-%Y"]),
            'month' => 'MONTH(created)',
            'year' => 'YEAR(created)'
        ])
            ->where([
                'created >=' => date('Y-m-01', strtotime('-11 months')),
                'created <=' => date('Y-m-t')
            ])
            ->groupBy(['year', 'month'])
            ->orderBy(['year' => 'ASC', 'month' => 'ASC']);

        $results = $query->all()->toArray();

        $totalByMonth = [];
        foreach ($expectedMonths as $expectedMonth) {
            $found = false;
            $count = 0;

            foreach ($results as $result) {
                if ($expectedMonth === $result->date) {
                    $found = true;
                    $count = $result->count;
                    break;
                }
            }

            $totalByMonth[] = [
                'month' => $expectedMonth,
                'count' => $count
            ];
        }

        $this->set([
            'results' => $totalByMonth,
            '_serialize' => ['results']
        ]);

        //data as JSON arrays for report chart
        $totalByMonth = json_encode($totalByMonth);
        $dataArray = json_decode($totalByMonth, true);
        $monthArray = [];
        $countArray = [];
        foreach ($dataArray as $data) {
            $monthArray[] = $data['month'];
            $countArray[] = $data['count'];
        }

        $this->set(compact('complaint', 'monthArray', 'countArray'));
    }

    /**
     * View method
     *
     * @param string|null $id Complaint id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('title', 'Complaint Details');
        $complaint = $this->Complaint->get($id, contain: ['Users', 'Faculties']);
        $this->set(compact('complaint'));

        $this->set(compact('complaint'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('title', 'New Complaint');
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Add']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Complaint']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $complaint = $this->Complaint->newEmptyEntity();
        if ($this->request->is('post')) {
            $complaint = $this->Complaint->patchEntity($complaint, $this->request->getData());
            if ($this->Complaint->save($complaint)) {
                $this->Flash->success(__('The complaint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The complaint could not be saved. Please, try again.'));
        }
        $users = $this->Complaint->Users->find('list', ['limit' => 200])->all();
        $faculties = $this->Complaint->Faculties->find('list', ['limit' => 200])->all();
        $this->set(compact('complaint', 'users', 'faculties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Complaint id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('title', 'Complaint Edit');
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Edit']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Complaint']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $complaint = $this->Complaint->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $complaint = $this->Complaint->patchEntity($complaint, $this->request->getData());
            if ($this->Complaint->save($complaint)) {
                $this->Flash->success(__('The complaint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The complaint could not be saved. Please, try again.'));
        }
		$users = $this->Complaint->Users->find('list', limit: 200)->all();
		$faculties = $this->Complaint->Faculties->find('list', limit: 200)->all();
        $this->set(compact('complaint', 'users', 'faculties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Complaint id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Delete']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Complaint']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $this->request->allowMethod(['post', 'delete']);
        $complaint = $this->Complaint->get($id);
        if ($this->Complaint->delete($complaint)) {
            $this->Flash->success(__('The complaint has been deleted.'));
        } else {
            $this->Flash->error(__('The complaint could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function archived($id = null)
    {
		$this->set('title', 'Complaint Edit');
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Archived']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Complaint']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $complaint = $this->Complaint->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $complaint = $this->Complaint->patchEntity($complaint, $this->request->getData());
			$complaint->status = 2; //archived
            if ($this->Complaint->save($complaint)) {
                $this->Flash->success(__('The complaint has been archived.'));

				return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The complaint could not be archived. Please, try again.'));
        }
        $this->set(compact('complaint'));
    }
}

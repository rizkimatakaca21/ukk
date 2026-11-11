<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Detailpenjualan Controller
 *
 * @property \App\Model\Table\DetailpenjualanTable $Detailpenjualan
 */
class DetailpenjualanController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Detailpenjualan->find();
        $detailpenjualan = $this->paginate($query);

        $this->set(compact('detailpenjualan'));
    }

    /**
     * View method
     *
     * @param string|null $id Detailpenjualan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailpenjualanEntity = $this->Detailpenjualan->get($id, contain: []);
        $this->set(compact('detailpenjualanEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailpenjualanEntity = $this->Detailpenjualan->newEmptyEntity();
        if ($this->request->is('post')) {
            $detailpenjualanEntity = $this->Detailpenjualan->patchEntity($detailpenjualanEntity, $this->request->getData());
            if ($this->Detailpenjualan->save($detailpenjualanEntity)) {
                $this->Flash->success(__('The detailpenjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detailpenjualan could not be saved. Please, try again.'));
        }
        $this->set(compact('detailpenjualanEntity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detailpenjualan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailpenjualanEntity = $this->Detailpenjualan->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailpenjualanEntity = $this->Detailpenjualan->patchEntity($detailpenjualanEntity, $this->request->getData());
            if ($this->Detailpenjualan->save($detailpenjualanEntity)) {
                $this->Flash->success(__('The detailpenjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detailpenjualan could not be saved. Please, try again.'));
        }
        $this->set(compact('detailpenjualanEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detailpenjualan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailpenjualanEntity = $this->Detailpenjualan->get($id);
        if ($this->Detailpenjualan->delete($detailpenjualanEntity)) {
            $this->Flash->success(__('The detailpenjualan has been deleted.'));
        } else {
            $this->Flash->error(__('The detailpenjualan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

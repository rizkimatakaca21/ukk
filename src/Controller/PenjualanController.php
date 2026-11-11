<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Penjualan Controller
 *
 * @property \App\Model\Table\PenjualanTable $Penjualan
 */
class PenjualanController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Penjualan->find();
        $penjualan = $this->paginate($query);

        $this->set(compact('penjualan'));
    }

    /**
     * View method
     *
     * @param string|null $id Penjualan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // CHANGED: ikut memuat detail penjualan
        $penjualanEntity = $this->Penjualan->get($id, contain: ['Detailpenjualan']);
        $this->set(compact('penjualanEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $penjualanEntity = $this->Penjualan->newEmptyEntity();
        $produkTable = $this->fetchTable('Produk'); // ADDED

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // ADDED: ambil baris yang produk dan jumlahnya terisi
            $detail = array_values(array_filter(
                $data['detailpenjualan'] ?? [],
                fn($row) => !empty($row['ProdukID']) && !empty($row['JumlahProduk']),
            ));

            // ADDED: ambil harga dari tabel produk (bukan dari form)
            $ids = array_column($detail, 'ProdukID');
            $harga = $ids
                ? $produkTable->find('list', keyField: 'ProdukID', valueField: 'Harga')
                    ->where(['ProdukID IN' => $ids])
                    ->toArray()
                : [];

            // ADDED: SubTotal = harga x jumlah, TotalHarga = jumlah semua SubTotal
            $total = 0;
            foreach ($detail as $i => $row) {
                $subtotal = (float)($harga[$row['ProdukID']] ?? 0) * (int)$row['JumlahProduk'];
                $detail[$i]['SubTotal'] = $subtotal;
                $total += $subtotal;
            }
            $data['detailpenjualan'] = $detail;
            $data['TotalHarga'] = $total;

            $penjualanEntity = $this->Penjualan->patchEntity($penjualanEntity, $data, [
                'associated' => ['Detailpenjualan'],
            ]);
            if ($this->Penjualan->save($penjualanEntity)) {
                // ADDED: kurangi stok sesuai jumlah yang terjual
                foreach ($detail as $row) {
                    $this->fetchTable('Produk')->updateAll(
                        ['Stok = Stok - ' . (int)$row['JumlahProduk']],
                        ['ProdukID' => $row['ProdukID']],
                    );
                }

                $this->Flash->success(__('The penjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            debug($penjualanEntity->getErrors()); // ADDED (temporary): hapus setelah berhasil
            $this->Flash->error(__('The penjualan could not be saved. Please, try again.'));
        }

        // ADDED: daftar produk untuk dropdown
        $produkList = $produkTable->find('list', keyField: 'ProdukID', valueField: 'NamaProduk')->toArray();
        $this->set(compact('penjualanEntity', 'produkList'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Penjualan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $penjualanEntity = $this->Penjualan->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $penjualanEntity = $this->Penjualan->patchEntity($penjualanEntity, $this->request->getData());
            if ($this->Penjualan->save($penjualanEntity)) {
                $this->Flash->success(__('The penjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The penjualan could not be saved. Please, try again.'));
        }
        $this->set(compact('penjualanEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Penjualan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $penjualanEntity = $this->Penjualan->get($id);
        if ($this->Penjualan->delete($penjualanEntity)) {
            $this->Flash->success(__('The penjualan has been deleted.'));
        } else {
            $this->Flash->error(__('The penjualan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
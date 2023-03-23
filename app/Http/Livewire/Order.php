<?php

namespace App\Http\Livewire;

use Livewire\Component;
use RealSoft\SAPBOSL\SAPClient;

class Order extends Component
{
    // https://laravel-news.com/crud-operations-using-laravel-livewire

    public $orders, $DocEntry, $DocNum, $CardCode, $CardName, $updateOrder = false, $addOrder = false;

    /**
     * delete action listener
     */
    protected $listeners = [
        'deletePostListner' => 'deletePost'
    ];

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'DocEntry' => 'required',
        'DocNum' => 'required',
        'CardCode' => 'required',
        'CardName' => 'required'
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields()
    {
        $this->DocEntry = '';
        $this->DocNum = '';
        $this->CardCode = '';
        $this->CardName = '';
    }

    /**
     * render the post data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $client = SAPClient::createSession();
        $session = $client->getSession();
        $client = new SAPClient(config('sap.sap'), $session);

        $orders = $client->getService('Orders');

        $result = $orders->queryBuilder()
            ->select('DocEntry,DocNum,CardCode,CardName')
            ->orderBy('DocNum', 'asc')
            ->findAll();

        // dd($result);
        $this->orders = $result->value;
        return view('livewire.order');
    }

    /**
     * Open Add Post form
     * @return void
     */
    public function addOrder()
    {
        $this->resetFields();
        $this->addOrder = true;
        $this->updateOrder = false;
    }
    //  /**
    //   * store the user inputted post data in the posts table
    //   * @return void
    //   */
    // public function storePost()
    // {
    //     $this->validate();
    //     try {
    //         Posts::create([
    //             'title' => $this->title,
    //             'description' => $this->description
    //         ]);
    //         session()->flash('success','Post Created Successfully!!');
    //         $this->resetFields();
    //         $this->addPost = false;
    //     } catch (\Exception $ex) {
    //         session()->flash('error','Something goes wrong!!');
    //     }
    // }

    // /**
    //  * show existing post data in edit post form
    //  * @param mixed $id
    //  * @return void
    //  */
    public function editOrder($id)
    {

        // dd($this->orders);
        try {
            $order = $this->searchForId($id, $this->orders);
            // dd($order);
            if (!$order) {
                session()->flash('error', 'Order not found');
            } else {
                $this->DocEntry = $order['DocEntry'];
                $this->DocNum = $order['DocNum'];
                $this->CardCode = $order['CardCode'];
                $this->CardName = $order['CardName'];
                $this->updateOrder = true;
                $this->addOrder = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!' . $ex->getMessage());
        }

    }

    // /**
    //  * update the post data
    //  * @return void
    //  */
    // public function updatePost()
    // {
    //     $this->validate();
    //     try {
    //         Posts::whereId($this->postId)->update([
    //             'title' => $this->title,
    //             'description' => $this->description
    //         ]);
    //         session()->flash('success','Post Updated Successfully!!');
    //         $this->resetFields();
    //         $this->updatePost = false;
    //     } catch (\Exception $ex) {
    //         session()->flash('success','Something goes wrong!!');
    //     }
    // }

    // /**
    //  * Cancel Add/Edit form and redirect to post listing page
    //  * @return void
    //  */
    // public function cancelPost()
    // {
    //     $this->addPost = false;
    //     $this->updatePost = false;
    //     $this->resetFields();
    // }

    // /**
    //  * delete specific post data from the posts table
    //  * @param mixed $id
    //  * @return void
    //  */
    // public function deletePost($id)
    // {
    //     try{
    //         Posts::find($id)->delete();
    //         session()->flash('success',"Post Deleted Successfully!!");
    //     }catch(\Exception $e){
    //         session()->flash('error',"Something goes wrong!!");
    //     }
    // }


    // https://stackoverflow.com/questions/6661530/php-multidimensional-array-search-by-value
    function searchForId($id, $array)
    {
        foreach ($array as $key => $val) {
            if ($val['DocEntry'] == $id) {
                return $key;
            }
        }
        return null;
    }
}

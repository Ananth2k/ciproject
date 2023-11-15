<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CrudModel;

class CrudController extends BaseController
{
    public function index($id=null){
    $model = new CrudModel();
    $data['users']= $model->find($id);
    echo view('crudlist',$data);
    return;

}
    public function create()
    {
        return view('crud_create');
    }
   
    public function store()
{
    $model = new CrudModel();
    $data = [
        'name'  => $this->request->getVar('name'), // Define $name as a string key
        'email' => $this->request->getVar('email')
    ];

    $model->save($data);
    return redirect()->to('/index');
}

    // delete
    public function delete($id = null){
        $userModel = new CrudModel();
        $data['user'] = $userModel->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/index'));
    }

    public function edit($id=null){
        $model = new CrudModel();
        $data['edit'] = $model->where('id',$id)->find($id);
        echo view('crud_edit',$data);
    return;

    }

public function update($id = null)
{
    $userModel = new CrudModel();

    $data = [
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email'),
    ];

    $userModel->update($id, $data);

    return redirect()->to(site_url('/'));
}




}

// -----------------------------------------------------------------------------------------
$routes->get('/','CrudController::index');
$routes->get('/index','CrudController::index');
$routes->get('/create','CrudController::create');
$routes->match(['get', 'post'], '/store', 'CrudController::store');
$routes->get('delete/(:num)', 'CrudController::delete/$1');
$routes->get('edit/(:num)', 'CrudController::edit/$1');
$routes->match(['get', 'post'], 'update/(:num)', 'CrudController::update/$1');

?>
<!-- // --------------------------------------------------------------------------------------- -->
 <tbody>
    <?php if($users): ?>
    <?php foreach($users as $user): ?>
      <tr>
      <th scope="row">1</th>
      <td><?php echo $user['name']; ?></td>
      <td><?php echo $user['email']; ?></td>
      <td><img src="" > </td>
      <td><a href="<?php echo base_url('edit/'.$user['id']); ?>"><button class="btn-warning">Edit</button></a>
      <a href="<?php echo base_url('delete/'.$user['id']); ?>"><button class="btn-danger">Delete</button></a></td>
      <td><button class="btn-primary">View</button></td>
      </tr>
    <?php endforeach ;?>
    <?php endif ;?>
   
  </tbody>
  <!-- ------------------------------------------------------------------------------------ -->

<!-- create -->
	<form method="post" action="store">

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Name</label>
	    <input  class="form-control" name="name" d="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Email address</label>
	    <input  class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
	    <input  class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  
	 
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
<!-- ----------------------------------------------------------------------------------------------------------- -->
<!-- edit -->
	<form method="post" action="<?= site_url('update/' . $edit['id']) ?>">

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Name</label>
	    <input  class="form-control" value="<?php echo $edit['name'];?>"name="name" d="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Email address</label>
	    <input  class="form-control" name="email"  value="<?php echo $edit['email'];?>" id="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
	    <input  class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  
	 
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>

<!-- --------------------------------------------------------------------------------------------------------------------------- -->

<!-- list -->
	<form method="post" action="<?= site_url('update/' . $edit['id']) ?>">

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Name</label>
	    <input  class="form-control" value="<?php echo $edit['name'];?>"name="name" d="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Email address</label>
	    <input  class="form-control" name="email"  value="<?php echo $edit['email'];?>" id="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
	    <input  class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
	  </div>

	  
	 
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
<!-- ------------------------------------------------------------------------------------------------------------------------- -->


<form method="post" action="<?= site_url('update/' . $edit['id']) ?>">

<div class="col-sm" >
<div class="d-flex justify-content-center mt-3">
      <div class="card mt-2 w-75" >
      <h5 class="z-1 position-absolute"><span class="mt-3 badge bg-secondary ">'.$value['category_name'].'</span></h5>
<img style="object-fit: cover;height:190px" src="'.$value['img_link'].'" class="w-100 card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">'.$value['product_name'].'</h5>
<p class="card-text">'.$value['product_desc'].'</p>
<div class="d-flex justify-content-between">
  <strong class="card-text">PRICE</strong>
<strong class="card-text text-success">'.$value['price'].'</strong>
<strong class="card-text text-success">THB</strong> 


</div>
<a href="" class="btn btn-success btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#Orders'.$value['product_id'].'">Orders</a>        </div>


</div>
</div>
      </div>
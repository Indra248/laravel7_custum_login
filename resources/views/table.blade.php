<div class="row col-12">

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search mt-2">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 " placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

   <!-- Nav Item - Search Dropdown (Visible Only XS) -->
   <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>
    
</div>

<div class="row" table-responsive>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
              <th scope="col">No</th>
              @foreach ($Field as $FieldRow)
              <th scope="col">{{$FieldRow}}</th>
              @endforeach
          </tr>
        </thead>
        <tbody>
        <?php 
        $no=($page== 10 ? 1 : $page);
        ?>
        @foreach ($data as $item)
        <tr class="option_{{$item->CUST_CODE}}" onclick="openOPT('{{$item->CUST_CODE}}')" style="cursor:pointer;">
                <th width="10px"><?php echo $no++;?></th>
                <?php
                for($i=0;$i <count($RowNames);$i++){?>
                <th><?php echo $item->{$RowNames[0]};?></th>
                <?php }?>
            </tr>
            <tr style="display:none;background:#e3f1ff;" class="open_opt_{{$item->CUST_CODE}}">   
                <td colspan="<?php echo count($RowNames) + 1; ?>">
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button> 
                </td>
            </tr>
         @endforeach

        </tbody>
      </table>
      
      {{$data->links()}}

    <div class="col-12">
       
    </div>
</div>

<script>
    function openOPT(data){
        $('.open_opt_'+data).toggle();
    }
</script>

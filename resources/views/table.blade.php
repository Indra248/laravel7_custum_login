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
        $Rno = 0;
        $no  =($page== 10 ? 0 : $page);
        ?>
        @foreach ($data as $item)
        @php
         $CountId = count($id);
                    for ($b=0; $b < $CountId ; $b++) { 
                        $tampung[$b] = $item->{$id[$b]};
                    }
        $tampung = array_map('trim', $tampung);            
          $Rno = $no++;
        @endphp
        <tr class="option_{{$Rno}}" onclick="openOPT('{{$Rno}}')" style="cursor:pointer;">
                <th width="10px"><?php echo $no++;?></th>
                <?php
                for($i=0;$i <count($RowNames);$i++){?>
                    <th><?php echo $item->{$RowNames[$i]};?></th>
                <?php }?>
            </tr>
            <tr style="display:none;background:#e3f1ff;" class="open_opt_{{$Rno}}">   
                <td colspan="<?php echo count($RowNames) + 1; ?>">
                    &nbsp;&nbsp;&nbsp;
                <?php 
                if (!empty($action['PROSES'])) {
                   for($a=0;$a < count($action["PROSES"]);$a++){
                       echo "<button class='btn btn-primary btn-sm' onclick='click_proses(\"".Azdgcrypt(implode('|',$tampung))."\")'>".$action['PROSES'][$a]['nama_proses']."</button> &nbsp;";
                    }   
                }
                if(!empty($action['POPUP'])){
                    for($a=0;$a < count($action["POPUP"]);$a++){
                       echo "<button class='btn btn-warning btn-sm' data-toggle=\"modal\" data-target=\"#exampleModal\" onclick='click_popup(\"".Azdgcrypt(implode('|',$tampung)).'|'.$action['POPUP'][$a]['url']."\", \"".$action['POPUP'][$a]['nama_popup']."\")'>".$action['POPUP'][$a]['nama_popup']."</button> &nbsp;";
                   } 
                }
                ?>  
                
                </td>
            </tr>
         @endforeach
         {{-- {{dd($tampung)}} --}}

        </tbody>
      </table>
      
      {{$data->links()}}

   
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form <span id="PopupName"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="LoadData"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Large modal -->
{{-- <button type="button" class="btn btn-primary">Large modal</button> --}}




<script>
    function openOPT(data){
        $('.open_opt_'+data).toggle(function(){
          
        });
    }

    function click_proses(dataa){
        alert(dataa);

    }

    function click_popup(dataa, PopupName){
        $('#PopupName').text(PopupName);
        let data = dataa.split('|');
        let url  = data[data.length-1];
        $('.LoadData').load(url, {a:data[0], "_token": "{{ csrf_token() }}"}, function (response, status, request) {
            
        });

        
    }
</script>

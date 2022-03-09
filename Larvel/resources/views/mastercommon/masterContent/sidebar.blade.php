 <!-- Sidebar -->
 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div id="sidebar-menu" class="sidebar-menu">
             <ul>
                 <li class="menu-title">
                     <span>اصلي مېنو</span>
                 </li>
                 <li class="">
                     <form action="/user/materials/{{ $programs[0]->program_id }}" method="get" id="my_form1">
                         <input type="hidden" name="role_id" id="" value="{{ $programs[0]->role_id }}">
                         <a href="#" onclick="document.getElementById('my_form1').submit();">
                             <span> درسي مواد </span> <i class="la la-book"></i> </span></a>
                     </form>
                 </li>
                 <li class="">
                     <form action="/user/feedbackAnswer/{{ $programs[0]->program_id }}" method="get" id="my_form2">
                         <input type="hidden" name="role_id" id="" value="{{ $programs[0]->role_id }}">
                         <a href="#" onclick="document.getElementById('my_form2').submit();"> <span> د پروګرام اړونده
                                 ارزونه</span> <i class="fa fa-pencil-square-o"></i> </span></a>
                     </form>
                 </li>

                 @if ($u_role == 2 || session('u_role') == 2)
                     <li class="">
                         <form action="/user/facilitatorMaterials/{{ $programs[0]->program_id }}" method="get"
                             id="my_form3">
                             <input type="hidden" name="role_id" id="" value="{{ $programs[0]->role_id }}">
                             <a href="#" onclick="document.getElementById('my_form3').submit();"> <span> د پروګرام لپاره
                                     مواد
                                     پورته
                                     کول</span> <i class="fa fa-upload"></i> </span></a>
                     </li>
                 @endif

             </ul>
         </div>
     </div>
 </div>
 <!-- /Sidebar -->

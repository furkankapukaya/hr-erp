//<script type="text/javascript">
      //console.log("adsad");
      $('#project-delete').on('shown.bs.modal', function (e) {
          var $invoker = $(e.relatedTarget);
          $(this).find('.btn-delete').attr("data-url", $invoker.attr("data-url"));
      })
      $('.btn-delete').on('click', function (e) {
        //e.preventDefault(); // 
        //e.stopPropogation(); //
        $this = $(this);
        $.ajax({
          url: $(this).attr("data-url"),
          data: {
            _method: 'delete'
          },
          type: 'post', 
          method: 'post',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: 'json',
          success: function(result){
             $("#project-table button[data-url='"+ $this.attr('data-url') +"']").parents("tr").eq(0).remove(); // 
             $("#project-delete").modal('hide'); // hide modal
             $("#project-container").append('<div class="alert alert-success" role="alert">'+result.message+'</div>') // show flash msg
             $('div.alert').not('.alert-important').delay(4000).fadeOut(200); // hide flash 
          }
        });

      })

 //   </script> 


   // <script>
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350); // Bütün alertlerı dinliyo
  //  </script>

    

   // <script type="text/javascript">
        $('.btn-edit-tmp-project').on('click', function (e) {
          //var $invoker = $(e.relatedTarget);
          //$(this).find('.btn-edit').attr("data-url", $invoker.attr("data-url"));

          $.ajax({
              type: 'get',
              url: $(this).attr("data-url"),
              method: 'get',
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(result) {
                  var prj = $("#project-edit");
                  prj.modal('show');
                  prj.find('*[name="first-name"]').val(result.project['name']);
                  prj.find('*[name="start-date"]').val(result.project['starts']);
                  prj.find('*[name="end-date"]').val(result.project['ends']);
                  prj.find('*[name="project-id-edit"]').val(result.project['id']);
                  prj.find('*[name="project-manager-edit"]').val(result.project.manager.id);
                  prj.find('*[name="project-manager-name-edit"]').val(result.project.manager.name + " " + result.project.manager.lastname);
                  var select = $("#project-workers-modal")
                  for(var i = 0 ; i < result.project.employees.length; i++){
                    var emp_id = result.project.employees[i].id;
                    console.log(result.project.employees[i].name);
                    select.find('*[name="employee-' + emp_id + '"]').attr('selected', true);
                  }
                

                 // $("#project-edit").find('*[name=')
              }
          });
        })

        $('.show-employees').on('click', function (e) {
          //var $invoker = $(e.relatedTarget);
          //$(this).find('.btn-edit').attr("data-url", $invoker.attr("data-url"));
          $('.employee-list').addClass('hide');
          $('.employee-list.list-'+$(this).attr('data')).removeClass('hide');
        })

        $('.btn-edit-project').on('click', function (e) {
          $this = $(this);
          $.ajax({
              type: 'post',
              url: $(this).attr("data-url"),
              method: 'post',
              data: {
                _method : 'update'
              },
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              dataType: 'json',
              success : function(result) {
                  alert('sa');
              }
          });

        })
        
  //  </script>



// DEMAND EDIT

$('.btn-edit-tmp-demand').on('click', function (e) {
    //var $invoker = $(e.relatedTarget);
    //$(this).find('.btn-edit').attr("data-url", $invoker.attr("data-url"));

    $.ajax({
        type: 'get',
        url: $(this).attr("data-url"),
        method: 'get',
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(result) {
            var demand = $("#demand-edit");
            demand.modal('show');
            demand.find('*[name="project-name-edit"]').val(result.demand.project['name']);
            demand.find('*[name="demand-title-edit"]').val(result.demand['title']);
            demand.find('*[name="information-edit"]').val(result.demand['info']);
            demand.find('*[name="demand-id-edit"]').val(result.demand['id']);
            

           // $("#project-edit").find('*[name=')
        }
    });
})


// VACATION EDIT

// DEMAND EDIT

$('.btn-edit-tmp-vacation').on('click', function (e) {
    //var $invoker = $(e.relatedTarget);
    //$(this).find('.btn-edit').attr("data-url", $invoker.attr("data-url"));

    $.ajax({
        type: 'get',
        url: $(this).attr("data-url"),
        method: 'get',
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(result) {
            var vacation = $("#vacation-edit");
            vacation.modal('show');
            vacation.find('*[name="vacation-owner-edit"]').val(result.vacation.employee['name']);
            vacation.find('*[name="vacation-ends-edit"]').val(result.vacation['ends']);
            vacation.find('*[name="vacation-information-edit"]').val(result.vacation['info']);
            vacation.find('*[name="vacation-starts-edit"]').val(result.vacation['starts']);
            vacation.find('*[name="vacation-id-edit"]').val(result.vacation['id']);
            

           // $("#project-edit").find('*[name=')
        }
    });
})



 
//Employee Modals

$('#employee-delete').on('shown.bs.modal', function (e) {
          var $invoker = $(e.relatedTarget);
          $(this).find('.btn-delete-project-modal').attr("data-url", $invoker.attr("data-url"));
})
$('.btn-delete-project-modal').on('click', function (e) {
  //e.preventDefault(); // 
  //e.stopPropogation(); //
  $this = $(this);
  $.ajax({
    url: $(this).attr("data-url"),
    data: {
      _method: 'delete'
    },
    type: 'post', 
    method: 'post',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    success: function(result){
       $("#employee-table button[data-url='"+ $this.attr('data-url') +"']").parents("tr").eq(0).remove(); // 
       $("#employee-delete").modal('hide'); // hide modal
       $("#employee-container").append('<div class="alert alert-success" role="alert">'+result.message+'</div>') // show flash msg
       $('div.alert').not('.alert-important').delay(4000).fadeOut(200); // hide flash 
    }});

})

$('#employee-update-form').on('submit', function (e) {
  e.preventDefault();
  $.ajax({
    url: $(this).attr("action"),
    type: 'post', 
    method: 'post',
    data: $(this).serialize(),
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    success: function(result){
       //$("#project-table button[data-url='"+ $this.attr('data-url') +"']").parents("tr").eq(0).remove(); // 
       $("#employee-edit").modal('hide'); // hide modal
       $("#employee-container").append('<div class="alert alert-success" role="alert">'+result.message+'</div>') // show flash msg
       $('div.alert').not('.alert-important').delay(4000).fadeOut(200); // hide flash 
       window.location.reload();
    }
  });
})

$('.btn-edit-tmp-employee').on('click', function (e) {
  var from_update = $("#employee-edit");
  from_update.find('*[id="employee-update-form"]').attr("action", "/employee/" + $(this).attr('next-url'));
  $.ajax({
      type: 'get',
      url: $(this).attr("data-url"),
      method: 'get',
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(result) {
          var empl = $("#employee-edit");
          empl.modal('show');
          empl.find('*[name="first-name"]').val(result.employee['name']);
          empl.find('*[name="last-name"]').val(result.employee['lastname']);
          empl.find('*[name="birth"]').val(result.employee['birthday']);
          empl.find('*[name="recruitment"]').val(result.employee['recruitment']);
          empl.find('*[name="email"]').val(result.employee['email']);
          empl.find('*[name="address"]').val(result.employee['address']);
          empl.find('*[name="gender"]').val(result.employee['gender']);
          empl.find('*[name="password"]').val(result.employee['password']);
         /* prj.find('*[name="first-name"]').val(result.project['name']);
          prj.find('*[name="start-date-"]').val(result.project['starts']);
          prj.find('*[name="end-date"]').val(result.project['ends']);
          prj.find('*[name="project-id-edit"]').val(result.project['id']);
          prj.find('*[name="project-manager-name-edit"]').val(result.project.manager.name + " " + result.project.manager.lastname);
          var select = $("#project-workers-modal")
          for(var i = 0 ; i < result.project.employees.length; i++){
            var emp_id = result.project.employees[i].id;
            console.log(result.project.employees[i].name);
            select.find('*[name="employee-' + emp_id + '"]').attr('selected', true);
          }
        */

         // $("#project-edit").find('*[name=')
      }
  });
})



//LECTURE SIGN

$('#lecture-sign').on('shown.bs.modal', function (e) {
  var $invoker = $(e.relatedTarget);
  $(this).find('.btn-lecture-sign-modal').attr("data-url", $invoker.attr("data-url"));
})

$('.btn-lecture-sign-modal').on('click', function (e) {
  //e.preventDefault(); // 
  //e.stopPropogation(); //
  $this = $(this);
  $.ajax({
    url: $(this).attr("data-url"),
    data: {
      _method: 'put'
    },
    type: 'post', 
    method: 'post',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: 'json',
    success: function(result){
       $("#lecture-sign").modal('hide'); // hide modal
       $("#project-container").append('<div class="alert alert-success" role="alert">'+result.message+'</div>') // show flash msg
       $('div.alert').not('.alert-important').delay(4000).fadeOut(200); // hide flash 
       window.location.reload();
    }
  });

})
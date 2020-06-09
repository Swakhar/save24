        $(function() {
            $('.toggle-class_main').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var name = $(this).attr("name");
                var id = $(this).data('id'); 
                 
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/changeMainCategoryStatus',
                    data: {'id': id, 'status': status,'name':name},
                    success: function(data){
                      console.log(data.success)
                    }
                });
            });
            $('.toggle-class_Sub').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var name = $(this).attr("name");
                var id = $(this).data('id'); 
                 
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/changeSubCategoryStatus',
                    data: {'id': id, 'status': status,'name':name},
                    success: function(data){
                      console.log(data.success)
                    }
                });
            });
            $('.toggle-class_child').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var name = $(this).attr("name");
                var id = $(this).data('id'); 
                 
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/changeChildCategoryStatus',
                    data: {'id': id, 'status': status,'name':name},
                    success: function(data){
                      console.log(data.success)
                    }
                });
            });

          })

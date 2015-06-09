var update = function() {
    $.ajax({
        type : 'POST',
        url : '../partage.php',
        success : function(data){
            $('#refresh').html(data);
            var refInterval = window.setTimeout('update()', 10000); // 30 seconds
        },
    });
};

update()
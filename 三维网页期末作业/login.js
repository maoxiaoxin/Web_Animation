
$("#load-more").click(function(){  
    $.ajax({  
        type:'POST',  
        url:'1.php',  
        dataType:'json',  
        success:function(data){  
            for(var i=0;i<data.length;i++){  
                var d=data[i];  
                $(".prod tbody").append('<tr>'+'<td>'+d.order_num+'</td>'+'<td>'+d.user_name+'</td>'+'<td>'+  
                d.shop_name+'</td>'+'<td>'+d.price+'</td>'+'<td>'+'<img src="'+d.product_img+'">'+'</td>'+'</tr>');  
            }  
        },  
        error:function(){  
            alert("获取数据出现错误!");  
        }  
    });  
});


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="drag_drop.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="drag_drop.js"></script>
    <div class="grid-item-select">
        <div class="card">
            <!-- <div class="card-header">
            <h3>Select</h3>
            </div> -->
            <div class="card-body">
            <h3>plant of user</h3>
                <ul id="sortable1" class="connectedSortable">
                    <!-- <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li>
                    <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li>
                    <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li>
                    <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li>
                    <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li> -->
                </ul>
            </div>
            </div>
        <div class="card">
            <!-- <div class="card-header">
            <h3>Unselect</h3>
            </div> -->
            <div class="card-body">
            <h3>plant is not user</h3>
                <ul id="sortable2" class="connectedSortable">
                     <!-- <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li>
                    <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li>
                    <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li>
                    <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li>
                    <li class="item">
                        <img src="https://cdn.shopify.com/s/files/1/0156/0137/products/refill_0005_mini_tomato.jpg?v=1521805792" alt="">
                        <div class="name">phutthi</div>
                    </li> -->
                </ul>
            </div>
        </div>   
     </div>
     <script>
        let id = sessionStorage.getItem('id');
    loaddata();
   function loaddata() {
       console.log("pinto");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                data = JSON.parse(this.responseText);
                // console.log(data[1].p_id);
                let text = ""
                for(i in data){
                    text+=` <li id='${data[i].p_id}' class="item">
                        <img src="../plant/tomato/${data[i].p_icon}" alt="">
                        <div class="name">${data[i].p_alias}</div>
                    </li>`
                }
                $("#sortable1").append(text);
            }
        };
        xhttp.open("GET", `data.php?id=${id}`, true);
        xhttp.send();
        var xhttp2 = new XMLHttpRequest();
        xhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                data = JSON.parse(this.responseText);
                // console.log(data[1].p_id);
                let text = ""
                for(i in data){
                    text+=` <li id='${data[i].p_id}' class="item">
                        <img src="../plant/tomato/${data[i].p_icon}" alt="">
                        <div class="name">${data[i].p_alias}</div>
                    </li>`
                }
                $("#sortable2").append(text);
            }
        };
        xhttp2.open("GET", `data2.php?id=${id}`, true);
        xhttp2.send();
    }
</script>

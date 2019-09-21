$(document).ready(function(){
    let arraySort1;
    let arraySort2;
    let id = sessionStorage.getItem('id');
    $( function() {
    $( "#sortable1, #sortable2" ).sortable({
        placeholder: "ui-state-highlight",
        connectWith: ".connectedSortable",
        items: "> li",
        // deactivate: function( event, ui ) {
        //   item = ui.item.attr('id');
        //   console.log(item+"ui:"+$(this).attr('id'));
        // },
        beforeStop: function( event, ui ) {
          // console.log($('#sortable1').attr('id'));
          arraySort1 = $('#sortable1').sortable( "toArray" );
          arraySort2 = $('#sortable2').sortable( "toArray" );
          // console.log(arraySort1+":"+arraySort2);
        }
    }).disableSelection();
    $( "#sortable1").on( "sortreceive", function( event, ui ) {
      item = ui.item.attr('id');
          addData(item,id);
    } );
    $( "#sortable1").on( "sortremove", function( event, ui ) {
      item = ui.item.attr('id');
       console.log($(this).attr('id')+" : receive");
        delData(item,id);
 } );


  } );
  $(document).on({
    mouseenter: function () {
        //stuff to do on mouse enter
        $( this ).addClass( "shadow" );
    },
    mouseleave: function () {
        //stuff to do on mouse leave
        $( this ).removeClass( "shadow" );
    }
}, "li");
//   $("li").on({
//     mouseenter: function () {
//       $( this ).addClass( "shadow" );
//     },
//     mouseleave: function () {
//       $( this ).removeClass( "shadow" );
//     }
// });
  function addData(id,i){
       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
       xhttp.open("POST", `add_Data.php`, true);
       
       xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
       xhttp.send(`id=${i}&item=${id}`);
  }
  function delData(id,i){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
         console.log(this.responseText);
     }
 };
    xhttp.open("POST", `del_Data.php`, true);
    
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send(`id=${i}&item=${id}`);
}
  // $( "#sortable1" ).on( "sortbeforestop", function( event, ui ) {
  //   console.log('drag');

  // } );
})

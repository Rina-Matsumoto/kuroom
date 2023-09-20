// $(function() {
//     get_data();
// });

// function get_data() {
//     $.ajax({
//         url: "/user/result/ajax/",
//         data: {
//             classroom_id: 40
//         },
//         dataType: "json",
//         success: data => {
//         $("#comment-data")
//         .find(".comment-visible")
//         .remove();

//             for (var i = 0; i < data.comments.length; i++) {
//                 var html = `
//                             <div class="media comment-visible">
//                                 <div class="media-body comment-body">
//                                     <div class="row">
//                                         <span class="comment-body-time" id="created_at">${data.comments[i].created_at}</span>
//                                     </div>
//                                     <span class="comment-body-content" id="comment">${data.comments[i].comment}</span>
//                                 </div>
//                             </div>
//                         `;
        
//                 $("#comment-data").append(html);
//             }
//         },
//     });

//     setTimeout("get_data()", 5000);
// }

//submitボタンをクリックしたら中身を実行する
$("#submit").on("click", function(){
    const url = "/user/result/ajax?classroom_id="+$("#comment").val();
    $.ajax({
        url: url,
        dataType: "json"
    }).done(function(data){
        console.log(data);
        // const len = data.items.length;
        // let html;
        //     for(let i=0; i<len; i++){
        //         console.log(typeof data.items[i].volumeInfo.publisher);
        //         if(typeof data.items[i].volumeInfo.publisher=="undefined"){
        //             data.items[i].volumeInfo.publisher="出版社（不明）";
        //         }
        //         html += `
        //             <tr>
        //                 <td>${data.items[i].volumeInfo.title}</td>
        //                 <td>${data.items[i].volumeInfo.publisher}</td>
        //                 <td>
        //                     <a target="_blank" href="${data.items[i].volumeInfo.infoLink}">
        //                         <img src="${data.items[i].volumeInfo.imageLinks.thumbnail}">
        //                     </a>
        //                 </td>
        //             </tr>
        //         `;
        //     }
    })
})



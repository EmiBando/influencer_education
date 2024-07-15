// console.log('java');
$(function(){
  $('.label-btn').click(function() {
    console.log('label-btn');
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: 'lavel_chenge'         
    })
    .done(function() {
      console.log('通信成功');
     

      let $result = $('#lavel-result');
      $result.empty(); //結果を一度クリア
      
      let html = `
        <button class="label-btn" id="attendance">受講済み</button>     
        `;
      $result.append(html);

    })
      .fail(function() {
        console.log('通信後失敗');
      
    });
  });
});


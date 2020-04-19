@extends('layouts.master')
@section('content')
    
    <div class="row col-lg-10 table-responsive m-0 p-0 tabContent activeTabContent">
        <div class="row m-0 ratingBar">
            <img src="/svg/star.svg" class="col-12">
            <h3 class="rating-title col-12 m-0">TV Show Rating</h3>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="table myshows-list reset-align">
                <tr class="d-flex">
                    <td class="col-1">#<i class="fa fa-sort"></i></td>
                    <td class="col-5">Title<i class="fa fa-sort"></i></td>
                    <td class="col-2">Rating<i class="fa fa-sort"></i></td>
                    <td class="col-2">Watching<i class="fa fa-sort"></i></td>
                    <td class="col-2">Audience<i class="fa fa-sort"></i></td>
                </tr>
                @if(count($series))
                    @foreach($series as $serie)
                    <tr class="d-flex">
                        <td class="col-1 ratingNumrow"></td>
                        <td class="col-5"><a href="show/{{ $serie->id }}">{{ $serie->title }}</a></td>
                        <td class="col-2">{{ $serie->rating }}</td>
                        <td class="col-2">{{ $serie->watching }}</td>
                        <td class="col-2">{{ $serie->audience }}%</td>
                    </tr>
                    @endforeach
                @endif
        </table>
    </div>

    <script>
	$(document).ready(function(){
		{{-- Sorting Table --}}
		$('.myshows-list').each(function(index){
			var tableIndex = index;
			$(this).find('tr').eq(0).find('td').each(function(){
				$(this).on('click', function(){

					var table = $('table').eq(tableIndex);
					var rows = table.find('tr').not(':eq(0)').toArray().sort(comparer($(this).index()));
					this.asc = !this.asc;
					if(this.asc){rows = rows.reverse()}
					for (var i = 0; i < rows.length; i++){table.append(rows[i])}
				});
			});
		});
		function comparer(index){
			return function(a, b){
				var valA = getCellValue(a, index), valB = getCellValue(b, index)
				return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
			}
		}
		function getCellValue(row, index){
			return $(row).children('td').eq(index).text()
		}
		{{-- Sorting Table --}}
        {{-- generate 1st column numbers --}}
        $('tr:not(:eq(0))').each(function(index){
            $(this).find('td').eq(0).html(index+1);
        });
        {{-- adding stars.svg elements --}}
        let w = $('.ratingBar').width();
        let imgWidth = 75;
        let numPerRow = parseInt(w / imgWidth, 10);
        
        for(let i=0;i<numPerRow;i++){
            let generateWidth = imgWidth * i;
            i==0 ? $('.ratingBar').append('<img src="/svg/stars.svg">') : $('.ratingBar').append('<img src="/svg/stars.svg" style="left:'+ generateWidth +'px">');
            i==0 ? $('.ratingBar').append('<img src="/svg/stars.svg" style="top:75px;">') : $('.ratingBar').append('<img src="/svg/stars.svg" style="top:75px;left:'+ generateWidth +'px">');
        }
        {{-- sort table header styles --}}
        $('.myshows-list tr:eq(0) td').on('click', function(index){
            $(this).find('i').css('color', 'black');
            $(this).prevAll().find('i').css('color', '#999');
            $(this).nextAll().find('i').css('color', '#999');
            
            $(this).css('background', 'rgba(203, 203, 203, 0.5)');
            $(this).prevAll().css('background', '#f1f1f1');
            $(this).nextAll().css('background', '#f1f1f1');
        });
	});

</script>
@endsection
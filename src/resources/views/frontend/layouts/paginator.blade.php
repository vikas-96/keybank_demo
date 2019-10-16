
<nav class="pull-right">
	@if(!$link_limit)
		<ul class="pagination">
			<li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
				@if($paginator->currentPage() == 1)
	                <a class="page-link" href="#">Previous</a>
	            @else
	            	<a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}">First</a>
	            @endif
			</li>
			
			@for ($i = 1; $i <= $paginator->lastPage(); $i++)
	            <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
	                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
	            </li>
	        @endfor
			<li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
	            @if($paginator->currentPage() == $paginator->lastPage())
	                <a class="page-link" href="#">Next</a>
	            @else
	            <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
	            @endif
	        </li>
		</ul>
		@else

		    @if ($paginator->lastPage() > 1)
		        <ul class="pagination">
		            <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
		                @if($paginator->currentPage() == 1)
		                
		                <a class="page-link" href="#">Previous</a>
		                @else
		                <a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}">Previous</a>
		                @endif
		             </li>
		             <?php
		                $half_total_links = floor($link_limit / 2);
		                $from = ($paginator->currentPage() - $half_total_links) < 1 ? 1 : $paginator->currentPage() - $half_total_links;
		                $to = ($paginator->currentPage() + $half_total_links) > $paginator->lastPage() ? $paginator->lastPage() : ($paginator->currentPage() + $half_total_links);
		                if ($from > $paginator->lastPage() - $link_limit) {
		                   $from = ($paginator->lastPage() - $link_limit) + 1;
		                   $to = $paginator->lastPage();
		                }
		                if ($to <= $link_limit) {
		                    $from = 1;
		                    $to = $link_limit < $paginator->lastPage() ? $link_limit : $paginator->lastPage();
		                }
		            ?>
		            @for ($i = $from; $i <= $to; $i++)
		                    <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
		                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
		                    </li>
		            @endfor
		            <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
		                @if($paginator->currentPage() == $paginator->lastPage())
		                	<a class="page-link" href="#">Next</a>
		                @else
		                	<a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}">Next</a>
		                @endif
		            </li>
		        </ul>
		    @endif
		@endif
</nav>

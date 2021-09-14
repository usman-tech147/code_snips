<ul class="list-group">
    @if($songs->count() > 0)
        @foreach($songs as $key=>$song)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-9">
                        <div class="row">
                            <div class="col-2">
                                {{$songs->firstItem() + $key}}
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-8">
                                        <h4><strong>Song:</strong> {{$song->name}} </h4>
                                    </div>
                                    <div class="col-4">
                                        <p><strong> Release Date: </strong> {{$song->release_date}} </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p><strong>Length:</strong> {{$song->length}} </p>
                                    </div>
                                    <div class="col-5">
                                        <p><strong>Album:</strong> {{$song->album->name}} </p>
                                    </div>
                                    <div class="col-4">
                                        <p><strong>Band:</strong> {{$song->album->band->name}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="float-right">
                            <a href="#" class="btn btn-sm btn-danger"> Delete </a>
                            <a href="#" class="btn btn-sm btn-warning"> View </a>
                            <a href="#" class="btn btn-sm btn-primary"> Edit </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    @else
        <li class="list-group-item">
            <p> No Song Found </p>
        </li>
    @endif
    <div class="mt-3">
        @if($songs->hasPages())
            {{$songs->onEachSide(5)->links('vendor.pagination.bootstrap-4')}}
        @else
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled" aria-disabled="true" aria-label="<">
                    <span class="page-link" style="border-radius: 20px; border-color: black; margin: 5px"
                          aria-hidden="true"> << </span>
                    </li>
                    <li class="page-item" aria-current="page"><span class="page-link"
                                                                    style="border-radius: 20px;border-color: black;color: green; margin: 5px">1</span>
                    </li>
                    <li class="page-item disabled" aria-disabled="true" aria-label="Next »">
                        <a class="page-link" aria-hidden="true"
                           style="border-radius: 20px;border-color: black; margin: 5px"> >> </a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
</ul>


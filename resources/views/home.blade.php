@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container"> 
 <div class="col-md-12">

        <div class="row">
          <?php $i = 0; ?>
            @foreach($posts as $index => $post)
             <?php $i++; ?>
            <div class="col-md-3">
             <div class="thumbnail">
                <img src="{{ asset('uploads/posts/thumbnail/' . $post->image) }}" alt="" class="img-responsive">
                <div class="caption">
                    <a href="{{ route('postentry', $post->slug) }}"><h3>{{ substr($post->title, 0, 20) }}</h3></a>
                </div>
            </div>
        </div>
        <?php if($index == 4) { ?>
            </div>

            <div class="row">
            
         <?php } ?>
       
        @endforeach
     </div>

        <div class="row">
            <div class="col-md-12">

            <p>ERM CIC A Community Interest Company Specialising in Intergenerational Projects working with a wide variety of communities, individuals and organisations Stimulating Creative Communitiessome clients we have enjoyed working with include:</p>


<p>
 <ul>
The Forum Trust, Norwich <br>
Norwich City Council <br>
Norfolk County Council <br>
Capital Shopping Centres <br>
Creative Arts East <br>
Hethersett School Cluster
 </ul>
 </p>



<p>We have successfully created projects with
Victory Housing
Heritage Lottery Fund
BBC Big Screen</p>

<p> ERM CIC, Eastern Region Media is a Community Interest Company that aims to provide access to a range of media and craft based skills and opportunities to communities in the Norfolk area. We firmly believe that individuals and communities benefit from developing film, animation, craft and arts projects that reflect and investigate their own environments, ideas, histories and stories. Winners of the 2013 Norfolk Arts Award for Education and Community work.
</p>
            </div>
        </div>

    </div>
</div>
@endsection

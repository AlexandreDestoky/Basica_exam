{{--
  Variables disponibles
    - $tags ARRAY(Tag)
 --}}

 @foreach ($tags as $index => $tag)
 {{ $tag->name }} <?php echo ($index === (count($tags) - 1)) ? '' : ','; ?>
@endforeach 
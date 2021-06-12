
<div class="sidebar-box">
          <form action="{{ route('results') }}" class="games-filter" method="GET">
            <div class="form-group">
                <select class="form-control" name="category" id="" onchange="">
                    <option value="0" selected>Categoría</option>
                    @foreach ($data['categories'] as $id => $name)
                        <option value="{{ $id }}" @if ($data['category'] == $id)
                        selected @endif>{{ $name }}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="gender" id="" onchange="">
                    <option value="0" selected>Sexo</option>
                    <option value="masculino" @if ($data['gender'] == 'masculino')
                    selected @endif>Masculino</option>
                    <option value="femenino" @if ($data['gender'] == 'femenino')
                    selected @endif>Femenino</option>
                </select>
            </div>

            <div class="form-group">
              <input class="form-control btn btn-primary" type="submit" value="Filtrar">
            </div>
          </form>
</div>

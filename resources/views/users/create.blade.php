
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="text" placeholder="Email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Designation</label>
                            <select class="form-control" name="designation_id">
                                @foreach($designations as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group pull-left">
                    <button type="submit" class="btn btn-secondary  float-right mr-2" data-bs-toggle="modal" data-bs-target="#delete-employee-modal">submit</button>
                    <button type="reset" class="btn btn-danger float-right mr-2">Reset form</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

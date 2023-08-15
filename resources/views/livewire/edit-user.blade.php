<div class="card-body">
    <form wire:submit.prevent="update">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="nameForm" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameForm"
                    placeholder="Name" wire:model="name">
                @error('name')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="emailForm" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailForm"
                    placeholder="name@example.com" wire:model="email">
                @error('email')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male"
                            wire:model="gender">
                        <label class="form-check-label" for="genderMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female"
                            wire:model="gender">
                        <label class="form-check-label" for="genderFemale" wire:model="gender">Female</label>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="ageForm" class="form-label">Age</label>
                <input type="number" class="form-control @error('age') is-invalid @enderror" id="ageForm"
                    placeholder="Age" wire:model="age">
                @error('age')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Hometown</label>
                <select class="form-select mb-3 @error('hometown') is-invalid @enderror"
                    aria-label="Large select example" wire:model="hometown">
                    <option hidden>--- Hometown ---</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                </select>
                @error('hometown')
                    <div class="invalid-feedback font-italic m-0 pl-1 font-weight-bold">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-2"
            onclick="return confirm('Sure to edit?')">Update</button>
        <a type="button" class="btn btn-secondary w-100" wire:click="backToCreate">Cancel</a>
    </form>
</div>

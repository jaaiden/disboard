@extends ('projects._layouts.base')
@section ('projects.title', 'Add New Project')
@section ('projects.hero.title', 'Add New Project')

@section ('projects.content')

    <section class="section">
        <div class="content">
            <form action="{{ route('projects.add') }}" method="post">

                {{ csrf_field() }}

                <div class="field">
                    <label class="label">Project Name</label>
                    <div class="control">
                        <input type="text" name="project_name" class="input">
                    </div>
                    @if ($errors->has('project_name'))
                    <p class="help is-danger">{{ $errors->first('project_name') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Project Description</label>
                    <div class="control">
                        <textarea class="textarea" name="project_desc" maxlength="250"></textarea>
                    </div>
                    @if ($errors->has('project_desc'))
                    <p class="help is-danger">{{ $errors->first('project_desc') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Project URL</label>
                    <div class="control">
                        <input type="text" name="project_url" class="input">
                    </div>
                    @if ($errors->has('project_url'))
                    <p class="help is-danger">{{ $errors->first('project_url') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Project Categories</label>
                    <div class="control">
                        <div class="select is-multiple">
                            <select multiple name="project_categories[]">
                                <option value="games">Games</option>
                                <option value="music">Music</option>
                                <option value="server-management">Server Management</option>
                            </select>
                        </div>
                    </div>
                    @if ($errors->has('project_categories'))
                    <p class="help is-danger">{{ $errors->first('project_categories') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Project Cover Image URL</label>
                    <div class="control">
                        <input type="text" name="project_cover_img" class="input">
                    </div>
                    <p class="help">Should have a ratio of 16:9, at least 960x540.</p> 
                    @if ($errors->has('project_cover_img'))
                    <p class="help is-danger">{{ $errors->first('project_cover_img') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Project App Icon URL</label>
                    <div class="control">
                        <input type="text" name="project_icon" class="input">
                    </div>
                    <p class="help">Should have a ratio of 1:1 (square), at least 512x512.</p> 
                    @if ($errors->has('project_icon'))
                    <p class="help is-danger">{{ $errors->first('project_icon') }}</p>
                    @endif
                </div>

                <div class="field">
                    <div class="buttons">
                        <button class="button is-info" type="submit">Add Project</button>
                        <button class="button" type="reset">Clear</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

@endsection
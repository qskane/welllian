<?php

namespace App\Admin\Controllers;

use App\Models\Scheme;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SchemeController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Scheme);

        $grid->id('Id');
        $grid->user()->name('User');
        $grid->media()->name('Media');
        $grid->name('Name');
        $grid->container('Container');
        $grid->quantity('Quantity');
        $grid->template()->name('Template');
        $grid->running('Running')->status();
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
        $grid->deleted_at('Deleted at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Scheme::findOrFail($id));

        $show->id('Id');
        $show->user_id('User id');
        $show->media_id('Media id');
        $show->name('Name');
        $show->container('Container');
        $show->quantity('Quantity');
        $show->template_id('Template id');
        $show->running('Running');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->deleted_at('Deleted at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Scheme);

        $form->number('user_id', 'User id');
        $form->number('media_id', 'Media id');
        $form->text('name', 'Name');
        $form->text('container', 'Container');
        $form->number('quantity', 'Quantity');
        $form->number('template_id', 'Template id');
        $form->switch('running', 'Running');

        return $form;
    }
}

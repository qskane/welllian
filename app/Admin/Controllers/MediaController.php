<?php

namespace App\Admin\Controllers;

use App\Models\Media;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MediaController extends Controller
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
        $grid = new Grid(new Media);

        $grid->id('Id');
        $grid->user_id('User id');
        $grid->name('Name');
        $grid->domain('Domain');
        $grid->consume_url('Consume url');
        $grid->logo('Logo');
        $grid->description('Description');
        $grid->key('Key');
        $grid->secret('Secret');
        $grid->verification_key('Verification key');
        $grid->verified('Verified');
        $grid->providing('Providing');
        $grid->consuming('Consuming');
        $grid->consumable('Consumable');
        $grid->consume_bid('Consume bid');
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
        $show = new Show(Media::findOrFail($id));

        $show->id('Id');
        $show->user_id('User id');
        $show->name('Name');
        $show->domain('Domain');
        $show->consume_url('Consume url');
        $show->logo('Logo');
        $show->description('Description');
        $show->key('Key');
        $show->secret('Secret');
        $show->verification_key('Verification key');
        $show->verified('Verified');
        $show->providing('Providing');
        $show->consuming('Consuming');
        $show->consumable('Consumable');
        $show->consume_bid('Consume bid');
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
        $form = new Form(new Media);

        $form->number('user_id', 'User id');
        $form->text('name', 'Name');
        $form->text('domain', 'Domain');
        $form->text('consume_url', 'Consume url');
        $form->textarea('logo', 'Logo');
        $form->text('description', 'Description');
        $form->text('key', 'Key');
        $form->text('secret', 'Secret');
        $form->text('verification_key', 'Verification key');
        $form->switch('verified', 'Verified');
        $form->switch('providing', 'Providing')->default(1);
        $form->switch('consuming', 'Consuming')->default(1);
        $form->switch('consumable', 'Consumable');
        $form->number('consume_bid', 'Consume bid')->default(1);

        return $form;
    }
}

<?php

namespace App\Admin\Controllers;

use App\Models\LeagueLog;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LeagueLogController extends Controller
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
        $grid = new Grid(new LeagueLog);

        $grid->id('Id');
        $grid->produce_media_id('Produce media id');
        $grid->consume_media_id('Consume media id');
        $grid->produce_domain('Produce domain');
        $grid->consume_domain('Consume domain');
        $grid->consume_url('Consume url');
        $grid->consume_bid('Consume bid');
        $grid->ip('Ip');
        $grid->user_agent('User agent');
        $grid->created_time('Created time');
        $grid->created_at('Created at');

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
        $show = new Show(LeagueLog::findOrFail($id));

        $show->id('Id');
        $show->produce_media_id('Produce media id');
        $show->consume_media_id('Consume media id');
        $show->produce_domain('Produce domain');
        $show->consume_domain('Consume domain');
        $show->consume_url('Consume url');
        $show->consume_bid('Consume bid');
        $show->ip('Ip');
        $show->user_agent('User agent');
        $show->created_time('Created time');
        $show->created_at('Created at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new LeagueLog);

        $form->number('produce_media_id', 'Produce media id');
        $form->number('consume_media_id', 'Consume media id');
        $form->text('produce_domain', 'Produce domain');
        $form->text('consume_domain', 'Consume domain');
        $form->text('consume_url', 'Consume url');
        $form->number('consume_bid', 'Consume bid');
        $form->ip('ip', 'Ip');
        $form->text('user_agent', 'User agent');
        $form->number('created_time', 'Created time');

        return $form;
    }
}

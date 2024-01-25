create table if not exists public.users
(
    users_id serial
    primary key,
    nickname varchar(255) not null,
    email    varchar(255) not null,
    password varchar(255) not null
    );

alter table public.users
    owner to selhtuqf;

create table if not exists public.dailyquests
(
    daily_quests_id integer default nextval('dailyquests_daily_quest_id_seq'::regclass) not null
    primary key,
    points          integer,
    name            varchar(100),
    description     varchar
    );

alter table public.dailyquests
    owner to selhtuqf;

create table if not exists public.userstats
(
    userstats_id     serial
    primary key,
    user_id          integer
    references public.users
    on update cascade on delete cascade,
    completed_quests integer default 0 not null,
    level            integer,
    points           integer
);

alter table public.userstats
    owner to selhtuqf;

create table if not exists public.userquests
(
    userquests_id   serial
    primary key,
    user_id         integer
    references public.users
    on update cascade on delete cascade,
    daily_quests_id integer
    constraint userquests_dailyquests_id_fkey
    references public.dailyquests
    on update cascade on delete cascade
);

alter table public.userquests
    owner to selhtuqf;

create trigger after_delete_userquests
    after delete
    on public.userquests
    for each row
    execute procedure public.update_userstats_points();

create table if not exists public.make_your_plan
(
    plan_id     serial
    primary key,
    users_id    integer      not null
    constraint make_your_plan_users_users_id_fk
    references public.users
    on update cascade on delete cascade,
    name        varchar(255) not null,
    description text,
    start_time  time,
    end_time    time,
    date        date
    );

alter table public.make_your_plan
    owner to selhtuqf;


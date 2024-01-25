CREATE TABLE "public.users" (
	"users_id" serial NOT NULL,
	"nickname" varchar(255) NOT NULL,
	"email" varchar(255) NOT NULL,
	"password" varchar(255) NOT NULL,
	CONSTRAINT "users_pk" PRIMARY KEY ("users_id")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "public.userstats" (
	"userstats_id" serial NOT NULL,
	"user_id" integer NOT NULL,
	"completed_quests" integer NOT NULL DEFAULT '0',
	"level" integer NOT NULL DEFAULT '1',
	"points" integer NOT NULL DEFAULT '0',
	CONSTRAINT "userstats_pk" PRIMARY KEY ("userstats_id")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "public.make_your_plan" (
	"plan_id" serial NOT NULL,
	"users_id" integer NOT NULL,
	"name" integer(255) NOT NULL,
	"description" integer NOT NULL,
	"start_time" TIME NOT NULL,
	"end_time" TIME NOT NULL,
	"date" DATE NOT NULL,
	CONSTRAINT "make_your_plan_pk" PRIMARY KEY ("plan_id")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "public.dailyquests" (
	"daily_quests_id" serial NOT NULL,
	"points" integer NOT NULL,
	"name" varchar(100) NOT NULL,
	"description" varchar NOT NULL,
	CONSTRAINT "dailyquests_pk" PRIMARY KEY ("daily_quests_id")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "public.userquests" (
	"userquests_id" serial NOT NULL,
	"user_id" integer NOT NULL,
	"daily_quests_id" integer NOT NULL,
	CONSTRAINT "userquests_pk" PRIMARY KEY ("userquests_id")
) WITH (
  OIDS=FALSE
);




ALTER TABLE "userstats" ADD CONSTRAINT "userstats_fk0" FOREIGN KEY ("user_id") REFERENCES "users"("users_id");

ALTER TABLE "make_your_plan" ADD CONSTRAINT "make_your_plan_fk0" FOREIGN KEY ("users_id") REFERENCES "users"("users_id");


ALTER TABLE "userquests" ADD CONSTRAINT "userquests_fk0" FOREIGN KEY ("user_id") REFERENCES "users"("users_id");
ALTER TABLE "userquests" ADD CONSTRAINT "userquests_fk1" FOREIGN KEY ("daily_quests_id") REFERENCES "dailyquests"("daily_quests_id");






